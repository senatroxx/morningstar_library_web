<?php

namespace App\Http\Controllers\API\User;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\User\Book\BookCollection;
use App\Http\Resources\User\Category\CategoryCollection;
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
        $featuredBooks = $this->bookService->getBookInRandomOrder(12);
        $recentBooks = $this->bookService->getBookByReleaseDate(20);
        $randomBooks = $this->bookService->getBookInRandomOrder(20);
        $latestNovel = $this->bookService->getBookByCategory('novel', 20);
        $latestComic = $this->bookService->getBookByCategory('komik', 20);
        $latestFinancial = $this->bookService->getBookByCategory('finansial', 20);

        return Response::status('success')
            ->message('Home retrieved successfully')
            ->result([
                'categories' => new CategoryCollection($categories, true, false),
                'featuredBooks' => new BookCollection($featuredBooks, true, false),
                'recentBooks' => new BookCollection($recentBooks, true, false),
                'randomBooks' => new BookCollection($randomBooks, true, false),
                'latestNovel' => new BookCollection($latestNovel, true, false),
                'latestComic' => new BookCollection($latestComic, true, false),
                'latestFinancial' => new BookCollection($latestFinancial, true, false),
            ]);
    }
}
