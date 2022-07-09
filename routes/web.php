<?php

use App\User;
use App\Promo;
use Carbon\Carbon;
use Braintree\Gateway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
        Route::get("/reviews", "UserController@getReviews")->name("reviews");

        Route::get("/statistics", "StatisticController@getStatistics")->name(
            "statistics"
        );

        Route::get("/logout", "UserController@logout")->name("logout");
        Route::delete("/{id}", "UserController@destroy")->name("destroy");
        Route::put("/tech/{id}", "UserController@updateTech")->name("tech");
        Route::get("/checkin", "PromoController@checkIn")->name("checkin");
        Route::get("/checkout/{id}", "PromoController@checkOut")->name(
            "checkout"
        );
        Route::put("/payment", "PromoController@payment")->name("payment");
        // Route::resource('/', "UserController");  <--credo sia troppo tardi per usarlo *facepalm*
        // ======================================== direi proprio di si, anche perche mi sa che praticamente non usiamo le classiche crud
    });

Route::get("{any?}", function () {
    return view("guest.home");
})->where("any", ".*");
