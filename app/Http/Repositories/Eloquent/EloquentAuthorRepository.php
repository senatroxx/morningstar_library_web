<?php

namespace App\Http\Repositories\Eloquent;

use App\Http\Repositories\Contracts\AuthorRepository;
use App\Models\Author;

class EloquentAuthorRepository implements AuthorRepository
{
    protected $model;

    public function __construct(Author $model)
    {
        $this->model = $model;
    }

    public function getAuthor($limit = 10, $q = null)
    {
        $author = $this->model->query();

        if ($q) {
            $author = $author->like('name', $q);
        }

        return $author->paginate($limit);
    }

    public function getAuthorBySlug($slug)
    {
        return $this->model->where('slug', $slug)->firstOrFail();
    }

    public function createAuthor(array $attributes = [])
    {
        return $this->model->create($attributes);
    }

    public function updateAuthor($slug, array $attributes = [])
    {
        return $this->getAuthorBySlug($slug)->update($attributes);
    }

    public function deleteAuthor($slug)
    {
        return $this->getAuthorBySlug($slug)->delete();
    }
}
