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
        $book = $this->model->query();

        if ($q) {
            $book = $book->like('title', $q);
        }

        $book->orderBy('id', 'desc');

        return $book->paginate($limit);
    }

    public function getBookById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function getBookInRandomOrder($limit = 10)
    {
        return $this->model->inRandomOrder()->take($limit)->get();
    }

    public function getBookByReleaseDate(int $limit = 10)
    {
        return $this->model
            ->orderBy('published_at', 'desc')
            ->paginate($limit);
    }

    public function getBookByCategory($categorySlug, $limit = 10)
    {
        return $this->model
            ->whereHas('categories', function ($query) use ($categorySlug) {
                $query->where('slug', 'like', "%$categorySlug%");
            })
            ->orderBy('published_at', 'desc')
            ->paginate($limit);
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
