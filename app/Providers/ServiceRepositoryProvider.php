<?php

namespace App\Providers;

use App\Http\Repositories\Contracts\AuthorRepository;
use App\Http\Repositories\Contracts\BookRepository;
use App\Http\Repositories\Eloquent\EloquentAuthorRepository;
use App\Http\Repositories\Eloquent\EloquentBookRepository;
use Illuminate\Support\ServiceProvider;

class ServiceRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AuthorRepository::class, EloquentAuthorRepository::class);
        $this->app->bind(BookRepository::class, EloquentBookRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
