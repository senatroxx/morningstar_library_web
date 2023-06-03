<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

        if ($request->json()) {
            return response()->json($authors->paginate(10, ['*'], 'page', $request->get('page', 1)));
        } else {
            return view('admin.author.index');
        }
    }
}
