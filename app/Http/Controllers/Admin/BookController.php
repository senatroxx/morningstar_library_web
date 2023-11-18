<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Book\StoreRequest;
use App\Http\Requests\Admin\Book\UpdateRequest;
use App\Http\Services\BookService;
use Illuminate\Http\Request;

class BookController extends Controller
{
    protected $service;

    public function __construct(BookService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $books = $this->service->getBook($request->limit, $request->q);

        if (request()->expectsJson()) {
            return response()->json($books);
        }

        return view('admin.book.index', ['books' => $books]);
    }

    public function create()
    {
        return view('admin.book.create');
    }

    public function store(StoreRequest $request)
    {
        $this->service->createBook($request->validated());

        return redirect()->route('admin.books.index')->with('success', 'Book created successfully');
    }

    public function edit($slug)
    {
        $book = $this->service->getBookBySlug($slug);

        return view('admin.book.edit', ['book' => $book]);
    }

    public function update($slug, UpdateRequest $request)
    {
        $this->service->updateBook($slug, $request->validated());

        return redirect()->route('admin.books.index')->with('success', 'Book updated successfully');
    }

    public function destroy($slug)
    {
        $this->service->deleteBook($slug);

        return redirect()->route('admin.books.index')->with('success', 'Book deleted successfully');
    }
}
