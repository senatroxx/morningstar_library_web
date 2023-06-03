<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::query();

        if ($request->has('q')) {
            $categories->where('name', 'LIKE', '%' . $request->get('q') . '%');
        }

        if ($request->json()) {
            return response()->json($categories->paginate(10, ['*'], 'page', $request->get('page', 1)));
        } else {
            return view('admin.category.index');
        }
    }
}
