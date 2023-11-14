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

}
