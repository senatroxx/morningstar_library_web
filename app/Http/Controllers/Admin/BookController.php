<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Book\StoreRequest;
use App\Http\Requests\Admin\Book\UpdateRequest;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::query();

        if (request('q')) {
            $books->where('title', 'LIKE', '%' . request('q') . '%');
        }

        $books = $books->paginate(10);

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
        $attributes = $request->validated();

        $path = Storage::disk('public')->put('thumbnails', $request->file('thumbnail'));

        $book = Book::create([
            ...$attributes,
            'thumbnail' => config('app.url') . '/storage/' . $path,
        ]);

        $book->categories()->sync($attributes['categories_id']);
        $book->authors()->sync($attributes['authors_id']);

        return redirect()->route('admin.books.index')->with('success', 'Book created successfully');
    }

    public function edit(Book $book)
    {
        $book->load(['authors', 'categories', 'publisher']);

        return view('admin.book.edit', ['book' => $book]);
    }

    public function update(Book $book, UpdateRequest $request)
    {
        $attributes = $request->validated();

        if ($request->hasFile('thumbnail')) {
            $filename = explode('/', $book->thumbnail);
            Storage::disk('public')->delete('thumbnails/' . $filename[array_key_last($filename)]);
            $path = Storage::disk('public')->put('thumbnails', $request->file('thumbnail'));
            $attributes['thumbnail'] = config('app.url') . '/storage/' . $path;
        }

        $book->update($attributes);

        $book->categories()->sync($attributes['categories_id']);
        $book->authors()->sync($attributes['authors_id']);

        return redirect()->route('admin.books.index')->with('success', 'Book updated successfully');
    }

    public function destroy(Book $book)
    {
        $filename = explode('/', $book->thumbnail);
        Storage::disk('public')->delete('thumbnails/' . $filename[array_key_last($filename)]);

        $book->delete();

        return redirect()->route('admin.books.index')->with('success', 'Book deleted successfully');
    }
}
