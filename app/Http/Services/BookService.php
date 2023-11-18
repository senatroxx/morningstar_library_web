<?php

namespace App\Http\Services;

use App\Http\Repositories\Contracts\BookRepository;
use Illuminate\Support\Facades\Storage;

class BookService
{
    protected $repository;

    public function __construct(BookRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getBook($limit = 10, $q = null)
    {
        return $this->repository->getBook($limit, $q);
    }

    public function getBookBySlug($slug)
    {
        return $this->repository->getBookBySlug($slug);
    }

    public function createBook(array $attributes = [])
    {
        $path = Storage::disk('google')->put('thumbnails', $attributes['thumbnail']);
        $file = Storage::disk('google')->getAdapter()->getUrl($path);

        $attributes['thumbnail'] = $file;
        $attributes['thumbnail_path'] = $path;

        return $this->repository->createBook($attributes);
    }

    public function updateBook($slug, array $attributes = [])
    {
        if (isset($attributes['thumbnail'])) {
            $book = $this->repository->getBookBySlug($slug);

            if ($book->thumbnail_path) {
                Storage::disk('google')->delete($book->thumbnail_path);
            }

            $path = Storage::disk('google')->put('thumbnails', $attributes['thumbnail']);
            $file = Storage::disk('google')->getAdapter()->getUrl($path);
            $attributes['thumbnail'] = $file;
            $attributes['thumbnail_path'] = $path;
        }

        return $this->repository->updateBook($slug, $attributes);
    }

    public function deleteBook($slug)
    {
        $book = $this->repository->getBookBySlug($slug);

        if ($book->thumbnail_path) {
            Storage::disk('google')->delete($book->thumbnail_path);
        }

        return $this->repository->deleteBook($slug);
    }

}
