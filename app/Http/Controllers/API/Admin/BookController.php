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

        $path = Storage::disk('google')->put('thumbnails', $request->file('thumbnail'));
        $file = Storage::disk('google')->getAdapter()->getUrl($path);


        $book = Book::create([
            ...$attributes,
            'thumbnail' => $file,
            'thumbnail_path' => $path,
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
            if ($book->thumbnail_path) {
                Storage::disk('google')->delete($book->thumbnail_path);
            }
            $path = Storage::disk('google')->put('thumbnails', $request->file('thumbnail'));
            $file = Storage::disk('google')->getAdapter()->getUrl($path);
            $attributes['thumbnail'] = $file;
            $attributes['thumbnail_path'] = $path;
        }

        $book->update($attributes);

        $book->categories()->sync($attributes['categories_id']);
        $book->authors()->sync($attributes['authors_id']);

        return redirect()->route('admin.books.index')->with('success', 'Book updated successfully');
    }

    public function destroy(Book $book)
    {
        if ($book->thumbnail_path) {
            Storage::disk('google')->delete($book->thumbnail_path);
        }

        $book->delete();

        return redirect()->route('admin.books.index')->with('success', 'Book deleted successfully');
    }
}
