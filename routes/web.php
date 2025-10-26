<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\controllers\CategoryController;
use App\Http\controllers\ProductController;
use App\Http\controllers\SettingController;


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


Route::group([
    'prefix' => 'settings',
    'controller' => SettingController::class,
    'as' => 'settings.'
], function () {
    Route::group([
        'prefix' => 'colors',
        'as' => 'colors.'
    ], function () {
        Route::get('/create', 'createColor')->name('createColor');
        Route::post('/update', 'upsertColor')->name('upsertColor');
        Route::get('/show', 'showColors')->name('showColors');
        Route::get('/delete', 'deleteColor')->name('deleteColor');
    });
});

Route::group([
    'prefix' => 'settings',
    'controller' => SettingController::class,
    'as' => 'settings.'
], function () {
    Route::group([
        'prefix' => 'logo',
        'as' => 'logo.'
    ], function () {
        Route::get('/create' , 'createLogo')->name('createLogo');
        Route::post('/update', 'upsertLogo')->name('upsertLogo');
        Route::get('/show', 'showLogo')->name('showLogo');
    });
});

Route::group([
    'prefix' => 'settings',
    'controller' => SettingController::class,
    'as' => 'settings.'
], function () {
    Route::group([
        'prefix' => 'main_ads',
        'as' => 'mainAds.'
    ], function () {
        Route::get('/create' , 'createMainAds')->name('createMainAds');
        Route::post('/update', 'upsertMainAds')->name('upsertMainAds');
        Route::get('/show', 'showMainAds')->name('showMainAds');
    });
});

Route::group([
    'prefix' => 'settings',
    'controller' => SettingController::class,
    'as' => 'settings.'
], function () {
    Route::group([
        'prefix' => 'main_banner_home',
        'as' => 'mainBanner.'
    ], function () {
        Route::get('/create' , 'createMainBanner')->name('createMainBanner');
        Route::post('/update', 'upsertMainBanner')->name('upsertMainBanner');
        Route::get('/show', 'showMainBanner')->name('showMainBanner');
    });
});

Route::group([
    'prefix' => 'settings',
    'controller' => SettingController::class,
    'as' => 'settings.'
], function () {
    Route::group([
        'prefix' => 'single_ads',
        'as' => 'singleAds.'
    ], function () {
        Route::get('/create' , 'createSingleAds')->name('createSingleAds');
        Route::post('/update', 'upsertSingleAds')->name('upsertSingleAds');
        Route::get('/show', 'showSingleAds')->name('showSingleAds');
    });
});

Route::group([
    'prefix' => 'settings',
    'controller' => SettingController::class,
    'as' => 'settings.'
], function () {
    Route::group([
        'prefix' => 'category_ads',
        'as' => 'categoryAds.'
    ], function () {
        Route::get('/create' , 'createCategoryAds')->name('createCategoryAds');
        Route::post('/update', 'upsertCategoryAds')->name('upsertCategoryAds');
        Route::get('/show', 'showCategoryAds')->name('showCategoryAds');
    });
});