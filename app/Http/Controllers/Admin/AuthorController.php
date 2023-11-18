<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Author\AuthorRequest;
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

        if ($request->wantsJson()) {
            return response()->json($authors);
        } else {
            return view('admin.author.index', [
                'authors' => $authors,
            ]);
        }
    }

    public function create()
    {
        return view('admin.author.create');
    }

    public function store(AuthorRequest $request)
    {
        $this->service->createAuthor($request->validated());

        return redirect()->route('admin.authors.index')->with('success', 'Author created successfully');
    }

    public function edit($slug)
    {
        $author = $this->service->getAuthorBySlug($slug);

        return view('admin.author.edit', [
            'author' => $author,
        ]);
    }

    public function update(AuthorRequest $request, $slug)
    {
        $this->service->updateAuthor($slug, $request->validated());

        return redirect()->route('admin.authors.index')->with('success', 'Author updated successfully');
    }

    public function destroy($slug)
    {
        $this->service->deleteAuthor($slug);

        return redirect()->route('admin.authors.index')->with('success', 'Author deleted successfully');
    }
}
