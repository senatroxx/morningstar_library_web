<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Facades\Vite;

class HomeController extends Controller
{
    public function index()
    {
        SEOTools::webPage(
            'Home',
            'Immerse yourself in a realm where every book you\'ve ever wanted to read is' .
            'available at your fingertips. Our online library specializes in book lending,' .
            'bridging the gap between readers and books. With our vast collection,' .
            'you can embark on thrilling adventures, explore new ideas,' .
            'and uncover hidden truths - all from the comfort of your home.' .
            'Our user-friendly platform makes borrowing a breeze; simply choose a book,' .
            'borrow it with a single click, and dive into your reading journey.' .
            'And don\'t worry about due dates, our flexible return policy lets you enjoy your' .
            'borrowed books at your own pace. Rediscover the magic of reading without' .
            'limits - borrow a book from our online library today!',
            'website',
            [Vite::asset('resources/images/logo.png')]
        );

        $categories = Category::withCount('books')->get();
        $recentBooks = Book::with('authors')->latest('id')->take(12)->get();
        $randomBooks = Book::with('authors')->inRandomOrder()->take(12)->get();

        return view("welcome", compact("categories", "recentBooks", "randomBooks"));
    }
}
