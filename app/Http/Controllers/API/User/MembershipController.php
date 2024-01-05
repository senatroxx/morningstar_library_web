<?php

namespace App\Http\Controllers\API\User;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Membership\PurchaseRequest;
use App\Http\Resources\User\Membership\MembershipCollection;
use App\Http\Services\MembershipService;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    protected $membersipService;
    protected $user;

    public function __construct(MembershipService $membershipService)
    {
        $this->middleware(function ($request, $next) {
            $this->user = auth()->user();

            return $next($request);
        });

        $this->membersipService = $membershipService;
    }

    public function index(Request $request)
    {
        $memberships = $this->membersipService->getMembership($request->limit ?? 10);

        return Response::status('success')
            ->message('Memberships retrieved successfully')
            ->result(new MembershipCollection($memberships));
    }

    public function purchase(PurchaseRequest $request)
    {
        $attributes = $request->validated();

        $transaction = $this->membersipService->purchaseMembership($this->user->id, $attributes['membership_id']);

        if ($transaction instanceof \Throwable) {
            return Response::status('failed')
                ->code($transaction->getCode() ?? 500)
                ->message("Something went wrong")
                ->result(! app()->isProduction() ? "$transaction" : null);
        }

        return Response::status('success')
            ->message('Invoice created successfully. Please complete the payment.')
            ->result($transaction);

    }
}
