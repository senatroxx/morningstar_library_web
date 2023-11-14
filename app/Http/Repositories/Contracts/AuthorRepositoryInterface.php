<?php

namespace App\Http\Repositories\Contracts;

interface AuthorRepository
{
    public function getAuthor();
    public function getAuthorById($id);
    public function createAuthor(array $attributes = []);
    public function updateAuthor($id, array $attributes = []);
    public function deleteAuthor($id);
}
