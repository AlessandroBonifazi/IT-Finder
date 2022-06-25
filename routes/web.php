<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get("/register", "Auth\RegisterController@showRegistrationForm")->name(
    "register"
);

// Route::middleware("auth")
//     ->namespace("User")
//     ->name("user.")
//     ->prefix("user")
//     ->group(function () {
//         // Route::get("/", "HomeController")->name("home");
//         Route::resource("/", "UserController");
//     });

Route::get("{any?}", function () {
    return view("guest.home");
})->where("any", ".*");
