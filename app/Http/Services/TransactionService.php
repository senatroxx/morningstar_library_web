<?php

namespace App\Http\Services;

use App\Helpers\Response;
use App\Http\Repositories\Contracts\TransactionRepository;
use DateTime;
use Illuminate\Support\Facades\DB;
use Xendit\Configuration;
use Xendit\Invoice\CreateInvoiceRequest;
use Xendit\Invoice\InvoiceApi;

class TransactionService
{

    protected $transactionRepository;
    protected $invoiceApi;

    public function __construct(TransactionRepository $transactionRepository)
    {
        Configuration::setXenditKey(config("xendit.key"));

        $this->transactionRepository = $transactionRepository;
        $this->invoiceApi = new InvoiceApi();
    }

    public function getTransaction($userId, int $limit = 10)
    {
        return $this->transactionRepository->getTransaction($limit);
    }

    public function getTransactionById($id)
    {
        return $this->transactionRepository->getTransactionById($id);
    }

    public function createTransaction(CreateInvoiceRequest $request, array $attributes)
    {
        DB::beginTransaction();

        try {
            $response = $this->invoiceApi->createInvoice($request);

            $transaction = $this->transactionRepository->createTransaction([
                ...$attributes,
                'ref_id' => $response['external_id'],
                'invoice_id' => $response['id'],
                'invoice_url' => $response['invoice_url'],
                'amount' => $response['amount'],
                'status' => $response['status'],
                'expired_at' => $response['expiry_date'],
            ]);

            DB::commit();

            return $transaction;
        } catch (\Throwable $err) {
            DB::rollBack();

            throw $err;
        }
    }

    public function xenditCallback(array $attributes = [])
    {
        $transaction = $this->transactionRepository->getTransactionByRefId($attributes['external_id']);

        if ($attributes['status'] === 'PAID') {
            $transaction->update([
                'status' => $attributes['status'],
                'paid_at' => new DateTime($attributes['paid_at']),
                'payment_method' => $attributes['payment_channel'],
            ]);

            if ($transaction->membership_id) {
                $transaction->user->update([
                    'membership_id' => $transaction->membership_id,
                    'balance' => $transaction->user->balance + $transaction->membership->balance,
                ]);
            }

            if ($transaction->lend_id) {
                $transaction->lend->update([
                    'status' => 'PROCESSING',
                ]);
            }

            if ($transaction->lend_report_id) {
                $transaction->lendReport->update([
                    'status' => 'PAID',
                ]);
            }
        } else if ($attributes['status'] === 'EXPIRED') {
            $transaction->update([
                'status' => $attributes['status'],
            ]);

            if ($transaction->lend_id) {
                $transaction->with('lend.books');

                $transaction->lend->update([
                    'status' => $attributes['status'],
                ]);

                foreach ($transaction->lend->books as $book) {
                    $book->increment('quantity');
                }
            }
        }
    }
}