<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Lend;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::count();
        $book = Book::count();
        $stock = Book::sum('quantity');
        $lend = Lend::count();
        $books = Book::latest('id')->take(5)->get();
        $lends = Lend::with(['user', 'book'])->latest('id')->take(5)->get();

        return view("admin.index", compact("user", "book", "books", "stock", "lend", "lends"));
    }
}
