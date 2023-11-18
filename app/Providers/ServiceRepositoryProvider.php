<?php

namespace App\Providers;

use App\Http\Repositories\Contracts\AuthorRepository;
use App\Http\Repositories\Eloquent\EloquentAuthorRepository;
use Illuminate\Support\ServiceProvider;

class ServiceRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AuthorRepository::class, EloquentAuthorRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
