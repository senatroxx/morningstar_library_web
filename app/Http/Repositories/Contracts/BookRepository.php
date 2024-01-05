<?php

namespace App\Http\Repositories\Contracts;

interface BookRepository
{
    public function getBook(int $limit = 10, string $q = null);
    public function getBookById($id);
    public function getBookBySlug($slug);
    public function getBookInRandomOrder(int $limit = 10);
    public function getBookByCategory($categorySlug, int $limit = 10);
    public function getBookByReleaseDate(int $limit = 10);
    public function createBook(array $attributes = []);
    public function updateBook($slug, array $attributes = []);
    public function deleteBook($slug);
}
