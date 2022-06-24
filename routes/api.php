<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware("auth:api")->get("/user", function (Request $request) {
    return $request->user();
});

// Route::get("/user/{id}/edit", "Api\UserController@edit")->name("user.edit");
// Route::get("/contact", "Api\UserController@update")->name("user.index");
// Route::get("/contact", "Api\ContactController@show")->name("user.show");

Route::post("/user/{id}/edit", "Api\UserController@update")->name(
    "user.update"
);
