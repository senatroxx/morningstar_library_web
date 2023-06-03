<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Lend\LendRequest;
use App\Models\Book;
use App\Models\Lend;
use Illuminate\Http\Request;

class LendController extends Controller
{
    public function index()
    {
        $lends = Lend::with('book', 'user')->when(request('q'), function ($query) {
            $query->whereHas('book', function ($query) {
                $query->where('title', 'like', '%' . request('q') . '%');
            })->orWhereHas('user', function ($query) {
                $query->where('name', 'like', '%' . request('q') . '%');
            });
        })->latest()->paginate(10);

        return view('admin.lend.index', compact('lends'));
    }

    public function create()
    {
        return view('admin.lend.create');
    }

    public function store(LendRequest $request)
    {
        $attributes = $request->validated();

        $book = Book::findOrFail($attributes['book_id']);

        if (!$attributes['returned'] && $book->quantity < 1) {
            return redirect()->back()->with('error', 'Book is out of stock');
        }

        if (!$attributes['returned']) {
            $book->decrement('quantity');
        }

        $start_date = explode(" ", $attributes['range'])[0];
        $finish_date = explode(" ", $attributes['range'])[2];

        Lend::create([
            ...$attributes,
            'returned' => $attributes['returned'] == 0 ? false : true,
            'start_date' => $start_date,
            'finish_date' => $finish_date,
        ]);

        return redirect()->route('admin.lends.index')->with('success', 'Lend created successfully');
    }

    public function edit(Lend $lend)
    {
        $lend->load('book', 'user');

        return view('admin.lend.edit', compact('lend'));
    }

    public function update(LendRequest $request, Lend $lend)
    {
        $attributes = $request->validated();

        $start_date = explode(" ", $attributes['range'])[0];
        $finish_date = explode(" ", $attributes['range'])[2];

        $lend->update([
            ...$attributes,
            'returned' => $attributes['returned'] == 0 ? false : true,
            'start_date' => $start_date,
            'finish_date' => $finish_date,
        ]);

        return redirect()->route('admin.lends.index')->with('success', 'Lend updated successfully');
    }

    public function returnBook(Lend $lend)
    {
        if ($lend->returned) {
            return redirect()->back()->with('error', 'Book already returned');
        }

        $lend->book()->increment('quantity');
        $lend->update(['returned' => true]);

        return redirect()->route('admin.lends.index')->with('success', 'Book returned successfully');
    }

    public function destroy(Lend $lend)
    {
        if (!$lend->returned) {
            $lend->book()->increment('quantity');
        }
        $lend->delete();

        return redirect()->route('admin.lends.index')->with('success', 'Lend deleted successfully');
    }
}
