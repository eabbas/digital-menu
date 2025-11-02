<?php
use Illuminate\Support\Facades\Route;
use App\http\controllers\CareerController;
use App\Http\Controllers\UserController;
use App\Http\controllers\CategoryController;
use App\Http\controllers\ProductController;
use App\Http\controllers\MenuController;
use App\Http\controllers\SettingController;
use App\Http\Controllers\QRCodeController;
use App\Http\Middleware\UserMiddleware;


Route::get('/', function () {
    return view('welcome');
})->name('home');
// Route::get('/career/create',[CareerController::class,'create']);
// // Route::get('/profile',[CareerController::class,'profile']);
// Route::post('/store',[CareerController::class,'store']);
// Route::get('/career/show/{id}',[CareerController::class,'show']);



Route::group([
    'prefix'=>'users',
    'controller'=>UserController::class,
    'as'=>'user.',
    'middleware'=>[UserMiddleware::class]
], function(){
    Route::get('/login', 'login')->name('login')->withoutMiddleware([UserMiddleware::class]);
    Route::get("/signup", "create")->name('signup')->withoutMiddleware([UserMiddleware::class]);
    Route::post("/store", "store")->name('store')->withoutMiddleware([UserMiddleware::class]);;
    Route::post("/check", "check")->name('check')->withoutMiddleware([UserMiddleware::class]);;
    Route::get("/logout", "logout")->name('logout');
    Route::get("/","index")->name('list');
    Route::get("/panel/{user}", "panel")->name('panel');
    Route::get('/profile/{user}', 'profile')->name('profile');
    Route::get("/edit/{user}", "edit")->name('edit');
    Route::post("/update", "update")->name('update');
    Route::get("/delete/{user}", "delete")->name('delete');

    Route::group([
        'prefix'=>'careers',
        'controller'=>CareerController::class,
        'as'=>'career.'
    ], function(){
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/list', 'user_careers')->name('careers');
        Route::get('/edit/{career}','edit')->name('edit');
        Route::post('/update','update')->name('update');
        Route::get('/delete/{career}','delete')->name('delete');
        Route::group([
            'prefix'=>'menus',
            'controller'=>MenuController::class,
            'as'=>'menu.'
        ], function(){
            Route::get('/{career}', 'index')->name('list');
            Route::get('/create/{career}', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{menu}', 'edit')->name('edit');
            Route::post('/update', 'update')->name('update');
            Route::get('/delete/{menu}')->name('delete');
        });
    });
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

// qr-code
Route::group([
    'prefix'=>'qrcode',
    'controller'=>QRCodeController::class,
    'as'=>'qr.'
], function(){
    Route::get('/qr-code', 'index')->name('list');
    Route::get('/delete/{qr_code}', 'delete')->name('delete');
    Route::get('/{career}/{slug}', 'load')->name('load');
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
