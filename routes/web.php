<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user/login', function () {
    return view('users.login');
})->name('user_login');

Route::get("user/signup",[UserController::class,"create"])->name('user_signUp');
Route::post("user/store",[UserController::class,"store"]);
Route::post("user/check",[UserController::class,"check"])->name('checkUser');
Route::get("user/logout",[UserController::class,"logout"]);
Route::get("user/index",[UserController::class,"index"]);
Route::get("user/show/{id}",[UserController::class,"show"]);
Route::get("user/edit/{id}",[UserController::class,"edit"]);
Route::post("user/update",[UserController::class,"update"])->name('userUpdate');
Route::get("user/delete/{id}",[UserController::class,"delete"]);


