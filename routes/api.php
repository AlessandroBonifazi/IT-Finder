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

// Route::get("/user/{id}/edit", "Api\UserController@edit")->name("user.edit");
// Route::get("/contact", "Api\UserController@update")->name("user.index");
// Route::get("/user", "Api\UserController@show")->name("user.show");

Route::post(
    "/{id}/completeRegistration",
    "Api\UserController@completeRegistration"
);
Route::get("/user/{id}", "Api\UserController@index")->name("user.index");
Route::get("/advancedSearch", "Api\UserController@search")->name("search");
Route::get("/specializations", "Api\SpecializationController@index")->name(
    "specialization.index"
);
Route::get("/best-users", "Api\UserController@bestUsers")->name("best-users");
