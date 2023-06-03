<?php

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
    Route::prefix("register")->group(function () {
        Route::get("/", [RegisterController::class, "show"])->name("register");
        Route::post("/", [RegisterController::class, "store"])->name(
            "register"
        );
    });

    Route::prefix("login")
        ->middleware("guest:admin,user")
        ->group(function () {
            Route::get("/", [LoginController::class, "show"])->name("login");
            Route::post("/", [LoginController::class, "login"])->name("login");
        });
});

Route::group(
    ["prefix" => "dashboard", "as" => "admin.", "middleware" => "auth:admin"],
    function () {
        Route::get("/", function () {
            return view("admin.index");
        })->name("index");
    }
);

Route::get("/", function () {
    return view("welcome");
});

Route::get("/login", function () {
    return view("login");
});

Route::get("/register", function () {
    return view("register");
});
