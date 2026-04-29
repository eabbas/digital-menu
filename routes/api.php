<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpecialUserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/scratch', function(Request $request) {
    return view('abbasScratch.index');
});

Route::post('/special-user-store', [SpecialUserController::class, 'store']);
Route::post('/cart/store', [CartController::class, 'store']);
Route::post('/cart/update', [CartController::class, 'update']);
Route::post('cart/showCarts', [CartController::class, 'showCarts']);
Route::post('cart/delete', [CartController::class, 'delete']);
Route::post('/order/show', [OrderController::class, 'show']);
Route::post('/order/store', [OrderController::class, 'store']);