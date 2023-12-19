<?php

namespace App\Http\Repositories\Contracts;

interface CategoryRepository
{
    public function getCategories($limit = 10, $q = null);
    public function getCategoryById($id);
    public function createCategory(array $attributes);
    public function updateCategory($id, array $attributes);
    public function deleteCategory($id);
}