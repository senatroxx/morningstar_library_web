<?php

namespace App\Http\Controllers\API\User;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Services\BookService;
use App\Http\Services\CategoryService;
use App\Models\Book;
use App\Models\Category;

class HomeController extends Controller
{
    protected $bookService;
    protected $categoryService;

    public function __construct(BookService $bookService, CategoryService $categoryService)
    {
        $this->bookService = $bookService;
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories = $this->categoryService->getCategory(20);
        $recentBooks = $this->bookService->getBook(12);
        $randomBooks = $this->bookService->getBookInRandomOrder(12);

        return Response::status('success')
            ->message('Home retrieved successfully')
            ->result([
                'categories' => $categories,
                'recentBooks' => $recentBooks,
                'randomBooks' => $randomBooks,
            ]);
    }
}
