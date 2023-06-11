<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('books')->get();
        $recentBooks = Book::with('authors')->latest('id')->take(12)->get();
        $randomBooks = Book::with('authors')->inRandomOrder()->take(12)->get();

        return view("welcome", compact("categories", "recentBooks", "randomBooks"));
    }
}
