<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\CategoryRequest;
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

        if ($request->wantsJson()) {
            return response()->json($categories->paginate(10, ['*'], 'page', $request->get('page', 1)));
        } else {
            return view('admin.category.index', [
                'categories' => $categories->paginate(10, ['*'], 'page', $request->get('page', 1)),
            ]);
        }
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryRequest $request)
    {
        Category::create($request->validated());

        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully');
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', [
            'category' => $category,
        ]);
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->validated());

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully');
    }
}
