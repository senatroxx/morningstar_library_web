<?php

namespace App\Providers;

use App\Http\Repositories\Contracts\AuthorRepository;
use App\Http\Repositories\Contracts\BookRepository;
use App\Http\Repositories\Contracts\CategoryRepository;
use App\Http\Repositories\Contracts\LendRepository;
use App\Http\Repositories\Contracts\MembershipRepository;
use App\Http\Repositories\Contracts\TransactionRepository;
use App\Http\Repositories\Contracts\UserRepository;
use App\Http\Repositories\Eloquent\EloquentAuthorRepository;
use App\Http\Repositories\Eloquent\EloquentBookRepository;
use App\Http\Repositories\Eloquent\EloquentCategoryRepository;
use App\Http\Repositories\Eloquent\EloquentLendRepository;
use App\Http\Repositories\Eloquent\EloquentMembershipRepository;
use App\Http\Repositories\Eloquent\EloquentTransactionRepository;
use App\Http\Repositories\Eloquent\EloquentUserRepository;
use Illuminate\Support\ServiceProvider;

class ServiceRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register() : void
    {
        $this->app->bind(AuthorRepository::class, EloquentAuthorRepository::class);
        $this->app->bind(BookRepository::class, EloquentBookRepository::class);
        $this->app->bind(UserRepository::class, EloquentUserRepository::class);
        $this->app->bind(LendRepository::class, EloquentLendRepository::class);
        $this->app->bind(CategoryRepository::class, EloquentCategoryRepository::class);
        $this->app->bind(MembershipRepository::class, EloquentMembershipRepository::class);
        $this->app->bind(TransactionRepository::class, EloquentTransactionRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot() : void
    {
        //
    }
}
