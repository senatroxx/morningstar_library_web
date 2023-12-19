<?php

namespace App\Http\Repositories\Contracts;

interface AuthorRepository
{
    public function getAuthor(int $limit = 10, string $q = null);
    public function getAuthorBySlug($slug);
    public function createAuthor(array $attributes = []);
    public function updateAuthor($slug, array $attributes = []);
    public function deleteAuthor($slug);
}
