<?php

namespace App\Http\Controllers\API\User;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Lend\LendRequest;
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
        $this->user = auth('api')->user();
        $this->service = $service;
    }

    public function index()
    {
        $lends = $this->service->getLend($this->user->id);

        return Response::status('success')
            ->message('Lends retrieved successfully')
            ->result(new LendCollection($lends));
    }

    public function store(Book $book, LendRequest $request)
    {
        $attributes = $request->validated();

        $this->service->createLend([
            ...$attributes,
            'book_slug' => $book->slug,
            'user_id' => $this->user->id,
        ]);

        return Response::status('success')
            ->message('Book borrowed successfully')
            ->result();
    }
}
