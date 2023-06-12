<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $books = Book::query();

        $books->with('authors');

        if ($request->has('q')) {
            $books->where('title', 'LIKE', '%' . $request->get('q') . '%');
        }

        $books = $books->paginate(24, ['*'], 'page', $request->get('page', 1));

        return view('user.book.index', compact('books'));
    }

    public function show(Book $book)
    {
        $book->load(['authors', 'categories']);

        $descriptionParts = explode('Detail', $book->description);
        if (count($descriptionParts) > 1) {
            array_pop($descriptionParts);
            $join = implode('Detail', $descriptionParts);
            $book->description = nl2br($join);
        }

        return view('user.book.detail', compact('book'));
    }
}
