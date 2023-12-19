<?php

namespace App\Http\Repositories\Eloquent;

use App\Http\Repositories\Contracts\CategoryRepository;
use App\Models\Category;

class EloquentCategoryRepository implements CategoryRepository
{
    protected $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    public function getCategories($limit = 10, $q = null)
    {
        $category = $this->model->query();

        if ($q) {
            $category = $category->like('name', $q);
        }

        return $category->paginate($limit);
    }

    public function getCategoryById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function createCategory(array $attributes)
    {
        return $this->model->create($attributes);
    }

    public function updateCategory($id, array $attributes)
    {
        return $this->model->findOrFail($id)->update($attributes);
    }

    public function deleteCategory($id)
    {
        return $this->model->findOrFail($id)->delete();
    }
}