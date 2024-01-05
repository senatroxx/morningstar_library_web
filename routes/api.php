<?php

// use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\Auth\PasswordController;
use App\Http\Controllers\API\Auth\RegisterController;
use App\Http\Controllers\API\User\AddressController;
use App\Http\Controllers\API\User\BookController;
use App\Http\Controllers\API\User\HomeController;
use App\Http\Controllers\API\User\LendController as UserLendController;
use App\Http\Controllers\API\User\MembershipController;
use App\Http\Controllers\API\User\ProfileController;
use App\Http\Controllers\API\User\TransactionController;
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

Route::post('xendit/callback', [TransactionController::class, 'callback']);

Route::prefix('my')->group(function () {
    Route::get('/', [HomeController::class, 'index']);

    Route::prefix('books')->group(function () {
        Route::get('/', [BookController::class, 'index']);
        Route::get('/{book:slug}', [BookController::class, 'show']);
        Route::get('/search/{query}', [BookController::class, 'search']);
    });

    Route::prefix('memberships')->group(function () {
        Route::get('/', [MembershipController::class, 'index']);

        Route::post('/purchase', [MembershipController::class, 'purchase'])
            ->middleware(['auth:api', 'scope:user,admin']);
    });

    Route::prefix('lends')
        ->middleware(['auth:api', 'scope:user,admin'])
        ->group(function () {
            Route::get('/', [UserLendController::class, 'index']);
            Route::post('/', [UserLendController::class, 'store']);
            Route::get('/{lend}', [UserLendController::class, 'show']);
            Route::post('/{lend}/cancel', [UserLendController::class, 'cancel']);
            Route::post('/{lend}/recieved', [UserLendController::class, 'recieved']);
            Route::post('/{lend}/return', [UserLendController::class, 'returnBook']);
        });

    Route::prefix('transactions')
        ->middleware(['auth:api', 'scope:user,admin'])
        ->group(function () {
            Route::get('/', [TransactionController::class, 'index']);
            Route::get('/{transaction}', [TransactionController::class, 'show']);
        });

    Route::prefix('profile')
        ->middleware(['auth:api', 'scope:user,admin'])
        ->group(function () {
            Route::get('/', [ProfileController::class, 'index']);
            Route::put('/', [ProfileController::class, 'update']);
            Route::put('/change-password', [ProfileController::class, 'changePassword']);

            Route::prefix('addresses')->group(function () {
                Route::get('/', [AddressController::class, 'index']);
                Route::get('/primary', [AddressController::class, 'getPrimary']);
                Route::post('/{id}/primary', [AddressController::class, 'setPrimary']);
                Route::post('/', [AddressController::class, 'store']);
                Route::put('/{id}', [AddressController::class, 'update']);
                Route::delete('/{id}', [AddressController::class, 'destroy']);
            });
        });
});
