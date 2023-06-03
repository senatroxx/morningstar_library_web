<?php

use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PublisherController;
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

Route::get('/', function () {
    return view('index');
})->name('user.index');

Route::prefix('auth')->group(function () {
    Route::prefix('register')->group(function () {
        Route::get('/', [RegisterController::class, 'show'])->name('register');
        Route::post('/', [RegisterController::class, 'store'])->name('register');
    });

    Route::prefix('login')->middleware('guest:admin,user')->group(function () {
        Route::get('/', [LoginController::class, 'show'])->name('login');
        Route::post('/', [LoginController::class, 'login'])->name('login');
    });
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
    });

    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('books.create');
        Route::post('/', [CategoryController::class, 'store'])->name('books.store');
        Route::get('/{book:slug}/edit', [CategoryController::class, 'edit'])->name('books.edit');
        Route::put('/{book:slug}', [CategoryController::class, 'update'])->name('books.update');
        Route::delete('/{book:slug}', [CategoryController::class, 'destroy'])->name('books.destroy');
    });

    Route::prefix('publishers')->group(function () {
        Route::get('/', [PublisherController::class, 'index'])->name('publishers.index');
    });
});
