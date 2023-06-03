<?php

use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\LendController;
use App\Http\Controllers\Admin\PublisherController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get("/", function () {
    return view("index");
})->name("user.index");

Route::prefix("auth")->group(function () {
    Route::prefix("register")
        ->middleware("guest:admin,user")
        ->group(function () {
            Route::get("/", [RegisterController::class, "show"])->name("register");
            Route::post("/", [RegisterController::class, "store"])->name("register");
        });

    Route::prefix("login")
        ->middleware("guest:admin,user")
        ->group(function () {
            Route::get("/", [LoginController::class, "show"])->name("login");
            Route::post("/", [LoginController::class, "login"])->name("login");
        });

    Route::post("logout", [LoginController::class, "logout"])->middleware("auth:admin,user")->name("logout");
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth:admin'], function () {
    Route::get('dashboard', function () {
        return view('admin.index');
    })->name('index');

    Route::prefix('books')->group(function () {
        Route::get('/', [BookController::class, 'index'])->name('books.index');
        Route::get('/create', [BookController::class, 'create'])->name('books.create');
        Route::post('/', [BookController::class, 'store'])->name('books.store');
        Route::get('/{book:slug}/edit', [BookController::class, 'edit'])->name('books.edit');
        Route::put('/{book:slug}', [BookController::class, 'update'])->name('books.update');
        Route::delete('/{book:slug}', [BookController::class, 'destroy'])->name('books.destroy');
    });

    Route::prefix('authors')->group(function () {
        Route::get('/', [AuthorController::class, 'index'])->name('authors.index');
        Route::get('/create', [AuthorController::class, 'create'])->name('authors.create');
        Route::post('/', [AuthorController::class, 'store'])->name('authors.store');
        Route::get('/{author:slug}/edit', [AuthorController::class, 'edit'])->name('authors.edit');
        Route::put('/{author:slug}', [AuthorController::class, 'update'])->name('authors.update');
        Route::delete('/{author:slug}', [AuthorController::class, 'destroy'])->name('authors.destroy');
    });

    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/{category:slug}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::put('/{category:slug}', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('/{category:slug}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    });

    Route::prefix('publishers')->group(function () {
        Route::get('/', [PublisherController::class, 'index'])->name('publishers.index');
        Route::get('/create', [PublisherController::class, 'create'])->name('publishers.create');
        Route::post('/', [PublisherController::class, 'store'])->name('publishers.store');
        Route::get('/{publisher:slug}/edit', [PublisherController::class, 'edit'])->name('publishers.edit');
        Route::put('/{publisher:slug}', [PublisherController::class, 'update'])->name('publishers.update');
        Route::delete('/{publisher:slug}', [PublisherController::class, 'destroy'])->name('publishers.destroy');
    });

    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/', [UserController::class, 'store'])->name('users.store');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    });

    Route::prefix('lends')->group(function () {
        Route::get('/', [LendController::class, 'index'])->name('lends.index');
        Route::get('/create', [LendController::class, 'create'])->name('lends.create');
        Route::post('/', [LendController::class, 'store'])->name('lends.store');
        Route::get('/{lend}/edit', [LendController::class, 'edit'])->name('lends.edit');
        Route::put('/{lend}', [LendController::class, 'update'])->name('lends.update');
        Route::delete('/{lend}', [LendController::class, 'destroy'])->name('lends.destroy');
        Route::post('/return/{lend}', [LendController::class, 'returnBook'])->name('lends.return');
    });
});
