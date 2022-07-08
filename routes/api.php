<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware("auth:api")->group(function () {
    Route::get("/user", function (Request $request) {
        return $request->user();
    });
});

Route::post(
    "/{id}/completeRegistration",
    "Api\UserController@completeRegistration"
);
Route::get("/user/{id}", "Api\UserController@getUser")->name("user.index");
Route::get("/advancedSearch", "Api\UserController@search")->name("search");
Route::get(
    "/searchPremiumUsers",
    "Api\UserController@searchPremiumUsers"
)->name("searchPremiumUsers");
Route::get("/specializations", "Api\SpecializationController@index")->name(
    "specialization.index"
);
Route::get("/technologies", "Api\TechnologyController@index")->name(
    "technology.index"
);
Route::get("/best-users", "Api\UserController@bestUsers")->name("best-users");
Route::get("/reviews", "Api\ReviewController@index")->name("review.index");
Route::get("/getUser/{id}", "Api\UserController@getUser")->name("user.getUser");

Route::get("/products", "Api\Products\ProductController@index");
Route::get("/payment/generate", "Api\Payment\PaymentController@generate");
Route::post(
    "/payment/make/payment",
    "Api\Payment\PaymentController@makePayment"
);

Route::post("/message/send/{id}", "Api\MessageController@send");
Route::post("/review/save", "Api\ReviewController@saveReview");
