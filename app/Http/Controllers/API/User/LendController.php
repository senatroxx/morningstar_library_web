<?php

namespace App\Http\Controllers\API\User;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Lend\LendRequest;
use App\Http\Requests\User\Lend\ReturnRequest;
use App\Http\Resources\User\Lend\LendCollection;
use App\Http\Services\LendService;
use App\Models\Book;
use App\Models\Lend;

class LendController extends Controller
{
    protected $user;
    protected $service;

    public function __construct(LendService $service)
    {
        $this->middleware(function ($request, $next) {
            $this->user = auth()->user();

            return $next($request);
        });

        $this->service = $service;
    }

    public function index()
    {
        $lends = $this->service->getLend($this->user->id);

        return Response::status('success')
            ->message('Lends retrieved successfully')
            ->result(new LendCollection($lends));
    }

    public function store(LendRequest $request)
    {
        $attributes = $request->validated();

        try {
            $lend = $this->service->createLend([
                ...$attributes,
                'user_id' => $this->user->id,
            ]);

            return Response::status('success')
                ->message('Book borrowed successfully')
                ->result($lend);
        } catch (\Throwable $e) {

            return Response::status('failed')
                ->code($e->getCode())
                ->message($e->getMessage())
                ->result();
        }
    }

    public function cancel(Lend $lend)
    {
        if ($lend->status == "PENDING") {
            $lend->update([
                'status' => 'CANCELED'
            ]);
        }

        return Response::status('success')
            ->message('Book lend canceled successfully')
            ->result();
    }

    public function recieved(Lend $lend)
    {
        $lend->update([
            'status' => 'RECIEVED'
        ]);

        return Response::status('success')
            ->message('Book recieved successfully')
            ->result();
    }

    public function returnBook(Lend $lend, ReturnRequest $request)
    {
        $attributes = $request->validated();

        $lend->update([
            ...$attributes,
            'status' => 'RETURNING',
        ]);

        return Response::status('success')
            ->message('Book returned successfully')
            ->result();
    }
}
