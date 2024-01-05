<?php

namespace App\Http\Services;

use App\Http\Repositories\Contracts\MembershipRepository;
use App\Http\Repositories\Contracts\TransactionRepository;
use App\Http\Repositories\Contracts\UserRepository;
use Xendit\Invoice\CreateInvoiceRequest;

class MembershipService
{
    protected $membershipRepository;
    protected $userRepository;
    protected $transactionRepository;
    protected $transactionService;

    public function __construct(MembershipRepository $membershipRepository, UserRepository $userRepository, TransactionRepository $transactionRepository, TransactionService $transactionService)
    {
        $this->membershipRepository = $membershipRepository;
        $this->userRepository = $userRepository;
        $this->transactionRepository = $transactionRepository;
        $this->transactionService = $transactionService;
    }

    public function getMembership(int $limit = 10)
    {
        return $this->membershipRepository->getMembership($limit);
    }

    public function purchaseMembership($userId, $membershipId)
    {
        $membership = $this->membershipRepository->getMembershipById($membershipId);
        $user = $this->userRepository->getUserById($userId);

        $refId = $this->transactionRepository->generateRefId();
        $totalPrice = $membership->price - $membership->discount_price;
        $xenditPayload = new CreateInvoiceRequest([
            'external_id' => $refId,
            'amount' => $totalPrice,
            'payer_email' => $user->email,
            'should_send_email' => true,
            'description' => "Pembelian membership {$membership->name} sebesar Rp. {$totalPrice}",
            'invoice_duration' => config('xendit.invoice_duration'),
            'success_redirect_url' => config('xendit.success_redirect_url'),
            'failure_redirect_url' => config('xendit.failure_redirect_url'),
            'currency' => 'IDR',
        ]);

        $transaction = $this->transactionService->createTransaction(
            $xenditPayload,
            [
                'user_id' => $user->id,
                'membership_id' => $membership->id,
            ]
        );

        return $transaction;
    }
}