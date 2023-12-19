<?php

namespace App\Http\Controllers\API\User;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\User\Book\BookCollection;
use App\Http\Services\BookService;
use App\Models\Book;
use Artesaos\SEOTools\Facades\SEOTools;
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
        $books = $this->service->getBook(24, $request->q);

        return Response::status('success')
            ->message('Books retrieved successfully')
            ->result(new BookCollection($books));
    }

    public function show($slug)
    {
        $book = $this->service->getBookBySlug($slug, true);

        return Response::status('success')
            ->message('Book retrieved successfully')
            ->result($book);
    }
}
