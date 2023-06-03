<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Author\AuthorRequest;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index(Request $request)
    {
        $authors = Author::query();

        if ($request->has('q')) {
            $authors->where('name', 'LIKE', '%' . $request->get('q') . '%');
        }

        if ($request->wantsJson()) {
            return response()->json($authors->paginate(10, ['*'], 'page', $request->get('page', 1)));
        } else {
            return view('admin.author.index', [
                'authors' => $authors->paginate(10, ['*'], 'page', $request->get('page', 1)),
            ]);
        }
    }

    public function create()
    {
        return view('admin.author.create');
    }

    public function store(AuthorRequest $request)
    {
        Author::create($request->validated());

        return redirect()->route('admin.authors.index')->with('success', 'Author created successfully');
    }

    public function edit(Author $author)
    {
        return view('admin.author.edit', [
            'author' => $author,
        ]);
    }

    public function update(AuthorRequest $request, Author $author)
    {
        $author->update($request->validated());

        return redirect()->route('admin.authors.index')->with('success', 'Author updated successfully');
    }

    public function destroy(Author $author)
    {
        $author->delete();

        return redirect()->route('admin.authors.index')->with('success', 'Author deleted successfully');
    }
}
