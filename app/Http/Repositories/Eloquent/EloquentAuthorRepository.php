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

    public function getAuthor()
    {
        return $this->model->paginate(10);
    }

    public function getAuthorById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function createAuthor(array $attributes = [])
    {
        return $this->model->create($attributes);
    }

    public function updateAuthor($id, array $attributes = [])
    {
        return $this->model->findOrFail($id)->update($attributes);
    }

    public function deleteAuthor($id)
    {
        return $this->model->findOrFail($id)->delete();
    }
}
