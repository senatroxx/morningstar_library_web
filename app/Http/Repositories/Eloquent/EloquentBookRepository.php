<?php

namespace App\Http\Repositories\Eloquent;

use App\Http\Repositories\Contracts\BookRepository;
use App\Models\Book;

class EloquentBookRepository implements BookRepository
{
    protected $model;

    public function __construct(Book $model)
    {
        $this->model = $model;
    }

    public function getBook($limit = 10, $q = null)
    {
        $author = $this->model->query();

        if ($q) {
            $author = $author->like('name', $q);
        }

        return $author->paginate($limit);
    }

    public function getBookBySlug($slug)
    {
        return $this->model
            ->with(['authors', 'categories', 'publisher'])
            ->where('slug', $slug)
            ->firstOrFail();
    }

    public function createBook(array $attributes = [])
    {
        $book = $this->model->create($attributes);

        $book->categories()->sync($attributes['categories_id']);
        $book->authors()->sync($attributes['authors_id']);

        return $book;
    }

    public function updateBook($slug, array $attributes = [])
    {
        $book = $this->getBookBySlug($slug);

        $book->categories()->sync($attributes['categories_id']);
        $book->authors()->sync($attributes['authors_id']);

        return $book->update($attributes);
    }

    public function deleteBook($slug)
    {
        return $this->getBookBySlug($slug)->delete();
    }
}
