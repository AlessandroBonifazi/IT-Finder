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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::middleware("auth")
    ->namespace("User")
    ->name("user.")
    ->prefix("user")
    ->group(function () {
        // Route::get("/", "HomeController")->name("home");
        Route::resource("/", "UserController");
    });

Route::get("/subscribe", "User/UserController@subscribe")->name("subscribe");
Route::get("/home", function () {
    return view("home");
});
