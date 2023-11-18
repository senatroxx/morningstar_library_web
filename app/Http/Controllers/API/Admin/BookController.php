<?php

namespace App\Http\Controllers\API\Admin;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Book\StoreRequest;
use App\Http\Requests\Admin\Book\UpdateRequest;
use App\Http\Resources\Admin\Book\BookCollection;
use App\Http\Resources\Admin\Book\BookResource;
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

        return Response::status('success')
            ->message('Books retrieved successfully')
            ->result(new BookCollection($books));
    }

    public function show($slug)
    {
        $book = $this->service->getBookBySlug($slug);

        return Response::status('success')
            ->message('Book retrieved successfully')
            ->result(new BookResource($book));
    }

    public function store(StoreRequest $request)
    {
        $book = $this->service->createBook($request->validated());

        return Response::status('success')
            ->message('Book created successfully')
            ->result(new BookResource($book));
    }

    public function update($slug, UpdateRequest $request)
    {
        $this->service->updateBook($slug, $request->validated());

        return Response::status('success')
            ->message('Book updated successfully')
            ->result();
    }

    public function destroy($slug)
    {
        $this->service->deleteBook($slug);

        return Response::status('success')
            ->message('Book deleted successfully')
            ->result();
    }
}
