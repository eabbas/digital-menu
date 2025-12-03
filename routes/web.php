<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\QRCodeController;
use App\Http\Controllers\ClientController;
// use App\Http\Controllers\adminController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\favoriteCareerController;
use App\Http\Middleware\LoginMiddleware;
use App\Http\Middleware\UserMiddleware;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CareerCategoryController;
use App\Http\Controllers\MenuCategoryController;
use App\Http\Controllers\CustomProductController;
use App\Http\Controllers\MenuItemController;
use App\Http\Controllers\CustomProductVariantController;
use App\Http\Controllers\CustomProductMaterialController;
use App\Http\Controllers\CustomCategoryController;
use App\Models\career;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('search' , [HomeController::class, 'search'])->name('search');
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware([LoginMiddleware::class]);
Route::get('/signup', [UserController::class, "create"])->name('signup')->middleware([LoginMiddleware::class]);
Route::group([
    'prefix' => 'users',
    'controller' => UserController::class,
    'as' => 'user.',
    'middleware' => [UserMiddleware::class]
], function () {
    Route::post("/store", "store")->name('store')->withoutMiddleware([UserMiddleware::class]);
    Route::post("/check", "check")->name('check')->withoutMiddleware([UserMiddleware::class]);
    Route::get("/logout", "logout")->name('logout');
    Route::get("/", "index")->name('list');
    Route::get("/panel/{user}", "panel")->name('panel');
    Route::get('/profile/{user}', 'profile')->name('profile');
    Route::get('/show/{user}', 'show')->name('show');
    Route::get("/edit/{user}", "edit")->name('edit');
    Route::post("/update", "update")->name('update');
    Route::get("/delete/{user}", "delete")->name('delete');
    Route::get('/compelete', 'compelete_form')->name('compelete_form');
    Route::post('/save', 'save')->name('save');
    Route::get('/admin/create', 'adminCreate')->name('adminCreate');
    Route::post('/admin/store', 'adminStore')->name('adminStore')->withoutMiddleware([UserMiddleware::class]);
    Route::get('/setting', 'setting')->name('setting');
    Route::post('/set', 'set')->name('set');
    route::post('/set_order', 'set_order')->name('set_order');
});

Route::group([
    'prefix' => 'careers',
    'controller' => CareerController::class,
    'as' => 'career.',
    'middleware' => [UserMiddleware::class]
], function () {
    Route::get('/create/{user?}', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/list/{user?}', 'user_careers')->name('careers')->withoutMiddleware([UserMiddleware::class]);
    Route::get('/edit/{career}/{user?}', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::get('/delete/{career}', 'delete')->name('delete');
    Route::get('/careers', 'index')->name('list');
    Route::get('/show/{career}', 'single')->name('single')->withoutMiddleware([UserMiddleware::class]);
    Route::get('/qrcodes/{career}', 'qr_codes')->name('qr_codes');
});

Route::group([
    'prefix' => 'careerCategory',
    'controller' => CareerCategoryController::class,
    'as' => 'cc.'
], function () {
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/', 'list')->name('list');
    Route::get('/show/{careerCategory}', 'show')->name('single');
    Route::get('/edit/{careerCategory}', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::get('/delete/{careerCategory}' , 'delete')->name('delete');
});

// Route::group([
//     'prefix' => 'menus',
//     'controller' => MenuController::class,
//     'as' => 'menu.',
//     'middleware' => [UserMiddleware::class]
// ], function () {
//     Route::get('/{career}', 'index')->name('list')->withoutMiddleware([UserMiddleware::class]);
//     Route::get('/create/{career}', 'create')->name('create');
//     Route::post('/store', 'store')->name('store');
//     Route::get('/edit/{menu}', 'edit')->name('edit');
//     Route::post('/update', 'update')->name('update');
//     Route::get('/delete/{menu}', 'delete')->name('delete');
//     Route::get('/qr_codes/{menu}', 'qr_codes')->name('qr_codes')->withoutMiddleware([UserMiddleware::class]);
// });

Route::group([
    'prefix'=>'menu',
    'controller'=>MenuItemController::class,
    'middleware'=>[UserMiddleware::class],
    'as'=>'menu.'
], function(){
    Route::get('/create/{menu_category}', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/addVariants/{menu_item}', 'variants')->name('variants');
    Route::get('/items/{menu_category}', 'items')->name('items');
    Route::get('/edit/{menu_item}', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::get('/show/{menu_item}', 'single')->name('single');
    Route::get('/delete/{menu_item}', 'delete')->name('delete');
});

Route::group([
    'prefix'=>'menuCategory',
    'controller'=>MenuCategoryController::class,
    'middleware'=>[UserMiddleware::class],
    'as'=>'menuCat.'
], function(){
    Route::get('/create/{career}', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/list/{career}', 'index')->name('list');
    Route::get('/edit/{menu_category}', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::get('/delete/{menu_category}', 'delete')->name('delete');
    Route::get('/{career}', 'menu')->name('menu');
});

//category.......................................................................
Route::get('category/create', [CategoryController::class, 'create']);
Route::post('category/store', [CategoryController::class, 'store']);
Route::get('categories', [CategoryController::class, 'index']);
Route::get('category/show/{category}', [CategoryController::class, 'show']);
Route::get('category/edit/{category}', [CategoryController::class, 'edit']);
Route::post('category/update', [CategoryController::class, 'update']);
Route::get('category/delete/{category}', [CategoryController::class, 'delete']);



//product.................................................................................
Route::get('product/create', [ProductController::class, 'create']);
Route::post('product/store', [ProductController::class, 'store']);
Route::get('products', [ProductController::class, 'index']);
Route::get('product/show/{product}', [ProductController::class, 'show']);
Route::get('product/edit/{product}', [ProductController::class, 'edit']);
Route::post('product/update', [ProductController::class, 'update']);
Route::get('product/delete/{product}', [ProductController::class, 'delete']);


// qr-code
Route::group([
    'prefix' => 'qrcode',
    'controller' => QRCodeController::class,
    'as' => 'qr.'
], function () {
    Route::get('/qr-code', 'index')->name('list');
    Route::get('/delete/{qr_code}', 'delete')->name('delete');
    Route::get('/{career}/{slug}', 'load')->name('load');
});

// client
Route::group([
    'prefix' => 'qrcodes',
    'controller' => ClientController::class,
    'as' => 'client.'
], function () {
    Route::get('/{career}/{slug?}', 'show_menu')->name('menu');
    Route::get('/{career}', 'career_menu')->name('careerMenu');
    // Route::get('/career/{$career}', 'show_career')->name('show_career');
});
Route::get('/career/{career}', [ClientController::class, 'show_career'])->name('show_career');


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
        Route::get('/create', 'createLogo')->name('createLogo');
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
        Route::get('/create', 'createMainAds')->name('createMainAds');
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
        Route::get('/create', 'createMainBanner')->name('createMainBanner');
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
        Route::get('/create', 'createSingleAds')->name('createSingleAds');
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
        Route::get('/create', 'createCategoryAds')->name('createCategoryAds');
        Route::post('/update', 'upsertCategoryAds')->name('upsertCategoryAds');
        Route::get('/show', 'showCategoryAds')->name('showCategoryAds');
    });
});

Route::fallback(function () {
    return view('client.login');
});


////admin
// Route::get('/adminProfile', [adminController::class, 'adminPanel'])->name('adminPanel');
// Route::group([
//     'prefix'=>'admin',
//     'controller'=>adminController::class,
//     'as'=>'admin.'
// ], function(){
//     Route::get('/profile', 'adminProfile')->name('adminProfile');
// });



/////slider
Route::group([
    'prefix' => 'slider',
    'controller' => SliderController::class,
    'as' => 'slider.'
], function () {
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/sliders', 'index')->name('list');
    Route::get('/edit/{slider}', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::get('/delete/{slider}', 'delete')->name('delete');
});


//////aboutUs
Route::group([
    'prefix' => 'aboutUs',
    'controller' => AboutUsController::class,
    'as' => 'aboutUs.'
], function () {
    Route::get('/create_edit/{id?}', 'create_edit')->name('create_edit');
    Route::post('/updateOrcreate', 'updateOrcreate')->name('updateOrcreate');
    Route::get('/aboutUs', 'index')->name('list');
    Route::get('/delete/{aboutUs}', 'delete')->name('delete');
});

//////favoriteCareer
Route::group([
    'prefix' => 'favoriteCareer',
    'controller' => favoriteCareerController::class,
    'as' => 'favoriteCareer.'
], function () {
    Route::get('/create/{id}', 'create')->name('create')->middleware([UserMiddleware::class]);
    Route::get('/favoriteCareers', 'index')->name('list');
    Route::get('/delete/{career}', 'delete')->name('delete');
});


Route::group([
    'prefix' => 'customProducts',
    'controller' => CustomProductController::class,
    'as' => 'cp.'
], function () {
    Route::get('/create/{career}', 'create')->name('create');
    Route::get('/createFromDashboard/{user}', 'createFromDashboard')->name('createFromDashboard');
    Route::post('/store', 'store')->name('store');
    Route::get('/customProductList', 'index')->name('list');
    Route::get('/show/{customProduct}', 'show')->name('single');
    Route::get('/edit/{customProduct}', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::get('/delete/{customProduct}', 'delete')->name('delete');
});

Route::group([
    'prefix' => 'customProductVariants',
    'controller' => CustomProductVariantController::class,
    'as' => 'cpv.'
], function () {
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/variantList', 'index')->name('list');
    Route::get('/show/{cpVariants}', 'show')->name('single');
    Route::get('/edit/{cpVariants}', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::get('/delete/{cpVariants}', 'delete')->name('delete');
});


Route::group([
    'prefix' => 'customProductMaterial',
    'controller' => CustomProductMaterialController::class,
    'as' => 'cpm.'
], function () {
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/materialList', 'index')->name('list');
    Route::get('/show/{cpm}', 'show')->name('single');
    Route::get('/edit/{cpm}', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::get('/delete/{cpm}', 'delete')->name('delete');
});
Route::group([
    'prefix' => 'customCategories',
    'controller' => CustomCategoryController::class,
    'as' => 'custmCategory.'
], function () {
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/custmoCategoryList', 'index')->name('list');
    Route::get('/show/{customCategory}', 'show')->name('single');
    Route::get('/edit/{customCategory}', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::get('/delete/{customCategory}', 'delete')->name('delete');
});
