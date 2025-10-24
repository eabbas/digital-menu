<?php

use Illuminate\Support\Facades\Route;
use App\http\controllers\ResturantController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/resturant/create',[ResturantController::class,'create']);
Route::get('/profile',[ResturantController::class,'profile']);
Route::post('/profileStore',[ResturantController::class,'profileStore']);
