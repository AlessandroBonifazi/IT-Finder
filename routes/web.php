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

Route::middleware("auth")
    ->namespace("User")
    ->name("user.")
    ->prefix("user")
    ->group(function () {
        Route::put(
            "/update-profile/{id}",
            "UserController@updateProfile"
        )->name("update-profile");
        Route::get(
            "/complete-registration",
            "UserController@completeRegistration"
        )->name("complete-registration");
        Route::get("/dashboard", "UserController@dashboard")->name("dashboard");
        Route::get("/profile", "UserController@profile")->name("profile");
        Route::get("/{id}/edit", "UserController@edit")->name("edit");
        Route::get("/messages", "UserController@getMessages")->name("messages");
        Route::get("/logout", "UserController@logout")->name("logout");
        Route::get("/checkin", "UserController@promos")->name("checkin");
        Route::get("/checkout", "UserController@checkOut")->name("checkout");
        // Route::resource('/', "UserController");
    });

Route::get("{any?}", function () {
    return view("guest.home");
})->where("any", ".*");
