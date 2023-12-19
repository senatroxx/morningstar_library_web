<?php

namespace App\Http\Services;

use App\Http\Repositories\Contracts\CategoryRepository;

class CategoryService
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getCategory($limit = 10, $q = null)
    {
        return $this->categoryRepository->getCategories($limit, $q);
    }
}