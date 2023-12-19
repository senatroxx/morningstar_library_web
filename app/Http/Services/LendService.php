<?php

namespace App\Http\Services;

use App\Helpers\Response;
use App\Http\Repositories\Contracts\BookRepository;
use App\Http\Repositories\Contracts\LendRepository;

class LendService
{

    protected $lendRepository;
    protected $bookRepository;

    public function __construct(LendRepository $lendRepository, BookRepository $bookRepository)
    {
        $this->lendRepository = $lendRepository;
        $this->bookRepository = $bookRepository;
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
        $book = $this->bookRepository->getBookBySlug($attributes['book_slug']);

        if ($book->quantity < 1) {
            if (request()->expectsJson()) {
                return Response::status('failed')
                    ->code(400)
                    ->message('Book is out of stock.')
                    ->result();
            }
            return redirect()->back()->with('error', 'Book is out of stock.');
        }

        $book->decrement('quantity');

        return $this->lendRepository->createLend([
            ...$attributes,
            'returned' => false,
            'book_id' => $book->id,
        ]);
    }
}