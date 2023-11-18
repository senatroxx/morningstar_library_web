<?php

namespace App\Http\Services;

use App\Http\Repositories\Contracts\AuthorRepository;

class AuthorService
{
    protected $repository;

    public function __construct(AuthorRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAuthor($limit = 10, $q = null)
    {
        return $this->repository->getAuthor($limit, $q);
    }

    public function getAuthorBySlug($slug)
    {
        return $this->repository->getAuthorBySlug($slug);
    }

    public function createAuthor(array $attributes = [])
    {
        return $this->repository->createAuthor($attributes);
    }

    public function updateAuthor($slug, array $attributes = [])
    {
        return $this->repository->updateAuthor($slug, $attributes);
    }

    public function deleteAuthor($slug)
    {
        return $this->repository->deleteAuthor($slug);
    }

}
