<?php

// use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\Auth\PasswordController;
use App\Http\Controllers\API\Auth\RegisterController;
use App\Http\Controllers\API\User\BookController;
use App\Http\Controllers\API\User\HomeController;
use App\Http\Controllers\API\User\LendController as UserLendController;
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
});

/**
 * User routes
 *
 */

// Route::prefix('categories')->group(function () {
//     Route::get('/', [CategoryController::class, 'index']);
//     Route::get('/{category:slug}', [CategoryController::class, 'show']);
// });

// Route::prefix('authors')->group(function () {
//     Route::get('/', [AuthorController::class, 'index']);
//     Route::get('/{author:slug}', [AuthorController::class, 'show']);
// });
Route::prefix('my')->group(function () {
    Route::get('/', [HomeController::class, 'index']);

    Route::prefix('books')->group(function () {
        Route::get('/', [BookController::class, 'index']);
        Route::get('/{book:slug}', [BookController::class, 'show']);
        Route::get('/search/{query}', [BookController::class, 'search']);
    });

    Route::prefix('lends')
        ->middleware(['auth:api', 'scope:user,admin'])
        ->group(function () {
            Route::get('/', [UserLendController::class, 'index']);
            Route::get('/{lend}', [UserLendController::class, 'show']);
            Route::post('/{book:slug}', [UserLendController::class, 'store']);
            Route::put('/{lend}', [UserLendController::class, 'update']);
        });
});
