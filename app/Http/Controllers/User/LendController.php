<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Lend\LendRequest;
use App\Models\Book;
use App\Models\Lend;

class LendController extends Controller
{
    public function store(Book $book, LendRequest $request)
    {
        $attributes = $request->validated();

        if ($book->quantity < 1) {
            return redirect()->back()->with('error', 'Book is out of stock');
        }

        $book->decrement('quantity');

        $lend = Lend::create([
            ...$attributes,
            'returned' => false,
            'user_id' => auth()->id(),
            'book_id' => $book->id,
        ]);

        dd($lend->toArray());

        return redirect()->route('user.books.index')->with('success', 'Book lend successfully');
    }
}
