<?php

namespace App\Http\Services;

use App\Helpers\CountWeeks;
use App\Helpers\RajaOngkir;
use App\Http\Repositories\Contracts\BookRepository;
use App\Http\Repositories\Contracts\LendRepository;
use App\Http\Repositories\Contracts\TransactionRepository;
use App\Models\UserAddress;
use Exception;
use Illuminate\Support\Facades\DB;
use Xendit\Invoice\CreateInvoiceRequest;
use Xendit\Invoice\InvoiceItem;
use Xendit\Invoice\CustomerObject;

class LendService
{

    protected $lendRepository;
    protected $bookRepository;
    protected $user;
    protected $transactionRepository;
    protected $transactionService;
    protected $rajaOngkir;

    public function __construct(LendRepository $lendRepository, BookRepository $bookRepository, TransactionService $transactionService, TransactionRepository $transactionRepository, RajaOngkir $rajaOngkir)
    {
        $this->lendRepository = $lendRepository;
        $this->bookRepository = $bookRepository;
        $this->transactionService = $transactionService;
        $this->transactionRepository = $transactionRepository;
        $this->rajaOngkir = $rajaOngkir;
        $this->user = auth('api')->user();
    }

    public function getLend($userId, int $limit = 10)
    {
        return $this->lendRepository->getLend($userId, $limit);
    }

    public function getLendById($id)
    {
        return $this->lendRepository->getLendById($id);
    }

    public function createLend(array $attributes = [])
    {
        DB::beginTransaction();
        try {
            if (! $this->user->membership) {
                throw new Exception("You don't have any membership.", 400);
            }

            if (count($attributes['books']) > $this->user->membership->max_borrow_count) {
                if (request()->expectsJson()) {
                    throw new Exception("You can only borrow {$this->user->membership->max_borrow_count} books at a time.", 400);
                }

                return redirect()->back()->with('error', 'You can only borrow 3 books at a time.');
            }

            $userAddress = UserAddress::with('city')->findOrFail($attributes['user_address_id']);
            if ($userAddress->user_id != $this->user->id) {
                if (request()->expectsJson()) {
                    throw new Exception('User address not found.', 400);
                }

                return redirect()->back()->with('error', 'User address not found.');
            }

            $totalWeeks = CountWeeks::count($attributes['start_date'], $attributes['finish_date']);

            foreach ($attributes['books'] as $key => $book) {
                $book = $this->bookRepository->getBookById($book);

                if ($book->quantity < 1) {
                    if (request()->expectsJson()) {
                        throw new Exception('Book is out of stock.', 400);
                    }
                    return redirect()->back()->with('error', 'Book is out of stock.');
                }

                $attributes['books'][$key] = $book;
                $attributes['books_id'][$key] = $book->id;
            }

            $books = [];

            $rajaOngkir = new RajaOngkir();
            // Calculate Shipping Cost
            $shipping_cost = $rajaOngkir->getCost(
                78, // orgin (seller city) 78 = bogor
                $userAddress->city->id, // destination (user city)
                1000, // weight
                $attributes['courier'],
            );

            // array_search($attributes['courier_service'], $cost['service']);
            $count = 0;
            foreach ($shipping_cost['rajaongkir']['results'][0]['costs'] as $cost) {
                if (strtolower($cost['service']) == strtolower($attributes['courier_service'])) {
                    $shipping_cost = $cost['cost'][0]['value'];
                    $count++;
                    break;
                }
            }

            if ($count == 0) {
                if (request()->expectsJson()) {
                    throw new Exception('Courier service not found.', 400);
                }

                return redirect()->back()->with('error', 'Courier service not found.');
            }

            foreach ($attributes['books'] as $book) {
                $book->decrement('quantity');
                array_push($books, new InvoiceItem([
                    'name' => $book->title,
                    'price' => $this->user->membership->fine_per_weeks * $totalWeeks,
                    'quantity' => 1
                ]));
            }

            array_push($books, new InvoiceItem([
                'name' => 'Ongkos Kirim Bogor - ' . $userAddress->city->name . ' (JNE)',
                'price' => $shipping_cost,
                'quantity' => 1
            ]));

            $lend = $this->lendRepository->createLend([
                ...$attributes,
                'shipping_courier' => $attributes['courier'],
                'user_address_id' => $userAddress->id,
                'status' => 'PENDING',
                'returned' => false,
            ]);

            $lend->books()->sync([
                ...$attributes['books_id'],
            ]);

            $refId = $this->transactionRepository->generateRefId();
            $totalPrice = ($this->user->membership->fine_per_weeks * count($attributes['books']) * $totalWeeks) + $shipping_cost;
            $xenditPayload = new CreateInvoiceRequest([
                'external_id' => $refId,
                'amount' => $totalPrice,
                'payer_email' => $this->user->email,
                'should_send_email' => true,
                'customer' => new CustomerObject([
                    'given_names' => $this->user->name,
                    'email' => $this->user->email,
                    'phone' => $this->user->phone,
                ]),
                'description' => "Peminjaman buku sebesar Rp. {$totalPrice}",
                'invoice_duration' => config('xendit.invoice_duration'),
                'success_redirect_url' => config('xendit.success_redirect_url'),
                'failure_redirect_url' => config('xendit.failure_redirect_url'),
                'currency' => 'IDR',
                'items' => $books,
            ]);

            $transaction = $this->transactionService->createTransaction(
                $xenditPayload,
                [
                    'user_id' => $this->user->id,
                    'lend_id' => $lend->id,
                ]
            );

            DB::commit();

            return [
                'lend' => $lend,
                'transaction' => $transaction
            ];
        } catch (\Throwable $e) {
            DB::rollBack();

            throw $e;
        }
    }
}