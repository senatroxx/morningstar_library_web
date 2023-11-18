<?php

use App\Http\Controllers\Admin\BookController as AdminBookController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\LendController;
use App\Http\Controllers\Admin\PublisherController;
use App\Http\Controllers\Admin\UserController;
// use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\API\Admin\AuthorController as AdminAuthorController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\User\BookController;
use App\Http\Controllers\User\LendController as UserLendController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::middleware('guest:api')->group(function () {
        Route::post('login', [LoginController::class, 'login']);
        Route::post('register', [RegisterController::class, 'store']);
        Route::prefix('forgot-password')->group(function () {
            Route::post('send-otp', [PasswordController::class, 'sendOtp']);
            Route::post('reset', [PasswordController::class, 'reset']);
        });
    });
    Route::middleware('auth:api')->group(function () {
        Route::post('logout', [LoginController::class, 'logout']);
    });
});

/**
 * Admin routes
 *
 */
Route::prefix('admin')
// ->middleware(['auth:api', 'scope:admin'])
    ->group(function () {
        Route::prefix('books')->group(function () {
            Route::get('/', [AdminBookController::class, 'index']);
            Route::get('/{book:slug}', [AdminBookController::class, 'show']);
            Route::post('/', [AdminBookController::class, 'store']);
            Route::put('/{book:slug}', [AdminBookController::class, 'update']);
            Route::delete('/{book:slug}', [AdminBookController::class, 'destroy']);
        });

        Route::prefix('categories')->group(function () {
            Route::get('/', [AdminCategoryController::class, 'index']);
            Route::get('/search/{query}', [AdminCategoryController::class, 'search']);
            Route::get('/{category:slug}', [AdminCategoryController::class, 'show']);
            Route::post('/', [AdminCategoryController::class, 'store']);
            Route::put('/{category:slug}', [AdminCategoryController::class, 'update']);
            Route::delete('/{category:slug}', [AdminCategoryController::class, 'destroy']);
        });

        Route::prefix('authors')->group(function () {
            Route::get('/', [AdminAuthorController::class, 'index']);
            Route::get('/{slug}', [AdminAuthorController::class, 'show']);
            Route::post('/', [AdminAuthorController::class, 'store']);
            Route::put('/{slug}', [AdminAuthorController::class, 'update']);
            Route::delete('/{slug}', [AdminAuthorController::class, 'destroy']);
        });

        Route::prefix('publishers')->group(function () {
            Route::get('/', [PublisherController::class, 'index']);
            Route::get('/search/{query}', [PublisherController::class, 'search']);
            Route::get('/{publisher:slug}', [PublisherController::class, 'show']);
            Route::post('/', [PublisherController::class, 'store']);
            Route::put('/{publisher:slug}', [PublisherController::class, 'update']);
            Route::delete('/{publisher:slug}', [PublisherController::class, 'destroy']);
        });

        Route::prefix('users')->group(function () {
            Route::get('/', [UserController::class, 'index']);
            Route::get('/{user}', [UserController::class, 'show']);
            Route::post('/', [UserController::class, 'store']);
            Route::put('/{user}', [UserController::class, 'update']);
            Route::delete('/{user}', [UserController::class, 'destroy']);
        });

        Route::prefix('lends')->group(function () {
            Route::get('/', [LendController::class, 'index']);
            Route::get('/{lend}', [LendController::class, 'show']);
            Route::post('/{book}', [LendController::class, 'store']);
            Route::put('/{lend}', [LendController::class, 'update']);
            Route::delete('/{lend}', [LendController::class, 'destroy']);
            Route::post('/return/{lend}', [LendController::class, 'returnBook']);
        });

        // Route::prefix('roles')->group(function () {
        //     Route::get('/', [RoleController::class, 'index']);
        // });

    });

/**
 * User routes
 *
 */
Route::prefix('books')->group(function () {
    Route::get('/', [BookController::class, 'index']);
    Route::get('/{book:slug}', [BookController::class, 'show']);
    Route::get('/search/{query}', [BookController::class, 'search']);
});

// Route::prefix('categories')->group(function () {
//     Route::get('/', [CategoryController::class, 'index']);
//     Route::get('/{category:slug}', [CategoryController::class, 'show']);
// });

// Route::prefix('authors')->group(function () {
//     Route::get('/', [AuthorController::class, 'index']);
//     Route::get('/{author:slug}', [AuthorController::class, 'show']);
// });

Route::prefix('lends')
    ->middleware(['auth:api', 'scope:user,admin'])
    ->group(function () {
        Route::get('/', [UserLendController::class, 'index']);
        Route::get('/{lend}', [UserLendController::class, 'show']);
        Route::post('/{book:slug}', [UserLendController::class, 'store']);
        Route::put('/{lend}', [UserLendController::class, 'update']);
    });
