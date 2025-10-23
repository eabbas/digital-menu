<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\CategoryController;
use App\Http\controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

//category.......................................................................
Route::get('category/create' , [CategoryController::class , 'create']);
Route::post('category/store' , [CategoryController::class , 'store']);
Route::get('categories' , [CategoryController::class , 'index']);
Route::get('category/show/{category}' , [CategoryController::class , 'show']);
Route::get('category/edit/{category}' , [CategoryController::class , 'edit']);
Route::post('category/update' , [CategoryController::class , 'update']);
Route::get('category/delete/{category}' , [CategoryController::class , 'delete']);



//product.................................................................................
Route::get('product/create' , [ProductController::class , 'create']);
Route::post('product/store' , [ProductController::class , 'store']);
Route::get('products' , [ProductController::class , 'index']);
Route::get('product/show/{product}' , [ProductController::class , 'show']);
Route::get('product/edit/{product}' , [ProductController::class , 'edit']);
Route::post('product/update' , [ProductController::class , 'update']);
Route::get('product/delete/{product}' , [ProductController::class , 'delete']);


