<?php

namespace App\Http\Controllers\API\User;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\User\Transaction\TransactionCollection;
use App\Http\Resources\User\Transaction\TransactionResource;
use App\Http\Services\TransactionService;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    protected $user;
    protected $transactionService;

    function __construct(TransactionService $transactionService)
    {
        $this->middleware(function ($request, $next) {
            $this->user = auth()->user();

            return $next($request);
        });

        $this->transactionService = $transactionService;
    }

    function index(Request $request)
    {
        $transactions = $this->transactionService->getTransaction($this->user->id, $request->limit ?? 10);

        return Response::status('success')
            ->message('Transactions retrieved successfully')
            ->result(new TransactionCollection($transactions));
    }

    function show($id)
    {
        $transaction = $this->transactionService->getTransactionById($id);

        if (! $transaction) {
            return Response::status('failed')
                ->code(404)
                ->message('Transaction not found.')
                ->result();
        }

        return Response::status('success')
            ->message('Transaction retrieved successfully')
            ->result(new TransactionResource($transaction));
    }

    function callback(Request $request)
    {
        $this->transactionService->xenditCallback($request->all());

        return Response::status('success')
            ->message('Transaction updated successfully')
            ->result();
    }
}
