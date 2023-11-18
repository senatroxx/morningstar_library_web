<?php

namespace App\Http\Controllers\API\Admin;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Author\AuthorRequest;
use App\Http\Resources\Admin\Author\AuthorCollection;
use App\Http\Resources\Admin\Author\AuthorResource;
use App\Http\Services\AuthorService;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    protected $service;

    public function __construct(AuthorService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $authors = $this->service->getAuthor($request->limit, $request->q);

        return Response::status('success')
            ->message('Authors retrieved successfully')
            ->result(new AuthorCollection($authors));
    }

    public function show($slug)
    {
        $author = $this->service->getAuthorBySlug($slug);

        return Response::status('success')
            ->message('Author retrieved successfully')
            ->result(new AuthorResource($author));
    }

    public function store(AuthorRequest $request)
    {
        $author = $this->service->createAuthor($request->validated());

        return Response::status('success')
            ->message('Author created successfully')
            ->result(new AuthorResource($author));
    }

    public function update(AuthorRequest $request, $slug)
    {
        $this->service->updateAuthor($slug, $request->validated());

        return Response::status('success')
            ->message('Author updated successfully')
            ->result();

    }

    public function destroy($slug)
    {
        $this->service->deleteAuthor($slug);

        return Response::status('success')
            ->message('Author deleted successfully')
            ->result();

    }
}
