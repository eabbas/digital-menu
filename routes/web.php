<?php

use App\Http\Controllers\CareerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\QRCodeController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\CareerCategoryController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\CustomCategoryController;
use App\Http\Controllers\CustomProductController;
use App\Http\Controllers\CustomProductMaterialController;
use App\Http\Controllers\CustomProductVariantController;
use App\Http\Controllers\EcommCategoryController;
use App\Http\Controllers\EcommController;
use App\Http\Controllers\EcommProductController;
use App\Http\Controllers\EcommQrCodeController;
use App\Http\Controllers\favoriteCareerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuCategoryController;
use App\Http\Controllers\MenuItemController;
use App\Http\Controllers\ProvinceCityController;
use App\Http\Controllers\SiteLinkController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SocialAddressController;
use App\Http\Controllers\SocialMediaController;
use App\Http\Controllers\favoritesController;
use App\Http\Controllers\FavoriteCategoriesController;
use App\Http\Controllers\ContactUsController;
use App\Http\Middleware\LoginMiddleware;
use App\Http\Middleware\UserMiddleware;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::any('search', [HomeController::class, 'search'])->name('search');
Route::any('filter', [HomeController::class, 'filter'])->name('filter');
Route::get('/login/{message?}', [UserController::class, 'login'])->name('login')->middleware([LoginMiddleware::class]);
Route::get('/signup', [UserController::class, 'create'])->name('signup')->middleware([LoginMiddleware::class]);
Route::post('/send_code', [UserController::class, 'send_code'])->name('send_code');
Route::post('/removeActivationCode', [UserController::class, 'removeActivationCode'])->name('removeActivationCode');
Route::get('/forget_password', [UserController::class, 'forget_password'])->name('forget_password');
Route::post('/set_password', [UserController::class, 'set_password'])->name('set_password');
Route::get('/reset_password/{user}', [UserController::class, 'reset_password'])->name('reset_password');
Route::post('/save_password', [UserController::class, 'save_password'])->name('save_password');
Route::post('/check', [UserController::class, 'checkAuth'])->name('checkAuth');
Route::post('/loginWithActivationCode', [UserController::class, 'loginWithActivationCode'])->name('loginWithActivationCode');

Route::group([
    'prefix' => 'users',
    'controller' => UserController::class,
    'as' => 'user.',
    'middleware' => [UserMiddleware::class]
], function () {
    Route::post('/store', 'store')->name('store')->withoutMiddleware([UserMiddleware::class]);
    Route::post('/check', 'check')->name('check')->withoutMiddleware([UserMiddleware::class]);
    Route::get('/logout', 'logout')->name('logout');
    Route::get('/', 'index')->name('list');
    Route::get('/panel/{user}', 'panel')->name('panel');
    Route::get('/profile', 'profile')->name('profile');
    Route::get('/show/{user}', 'show')->name('show');
    Route::get('/edit/{user}', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::get('/delete/{user}', 'delete')->name('delete');
    Route::post('/deleteAll', 'deleteAll')->name('deleteAll');
    Route::get('/compelete', 'compelete_form')->name('compelete_form');
    Route::post('/save', 'save')->name('save');
    Route::get('/setting', 'setting')->name('setting');
    Route::post('/set', 'set')->name('set');
    route::post('/set_order', 'set_order')->name('set_order');
    Route::get('/create_user', 'create_user')->name('create_user');
    Route::post('/store_user', 'store_user')->name('store_user');
    Route::post('/search', 'search')->name('search');
    Route::post('/checkFromMenu', 'checkFromMenu')->name('checkFromMenu')->withoutMiddleware([UserMiddleware::class]);
    Route::post('/setAddress', 'setAddress')->name('setAddress');
    Route::post('/customerSearch', 'customerSearch')->name('customerSearch');
    Route::get('/customers', 'myUsers')->name('myUsers');
    Route::get('/request/{user}', 'request')->name('request');
    Route::get('/requestList', 'requestList')->name('requestList');
    Route::post('/requestEvent', 'requestEvent')->name('requestEvent');
    Route::get('/deleteRequest/{requests}', 'deleteRequest')->name('deleteRequest');
    Route::get('/acceptRequest/{requests}', 'acceptRequest')->name('acceptRequest');
});

Route::group([
    'prefix' => 'careers',
    'controller' => CareerController::class,
    'as' => 'career.',
    'middleware' => [UserMiddleware::class]
], function () {
    Route::get('/create/{user?}', 'create')->name('create');
    Route::get('/createUser', 'createUser')->name('createUser');
    Route::post('/storeUser', 'storeUser')->name('storeUser');
    Route::post('/store', 'store')->name('store');
    Route::get('/userCareers/{user?}', 'user_careers')->name('careers');
    Route::get('/edit/{career}/{user?}', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::get('/delete/{career}', 'delete')->name('delete');
    Route::get('/list', 'index')->name('list');
    Route::get('/show/{career}', 'single')->name('single')->withoutMiddleware([UserMiddleware::class]);
    Route::get('/qrcodes/{career}', 'qr_codes')->name('qr_codes');
    Route::get('/menuList/{career}', 'menus')->name('menus');
    Route::get('/careersCategories', 'careersCategories')->name('careersCategories')->withoutMiddleware([UserMiddleware::class]);
    Route::get('/careersList', 'careersList')->name('careersList')->withoutMiddleware([UserMiddleware::class]);
    Route::post('/deleteAll', 'deleteAll')->name('deleteAll');
    Route::get('/categoryCareers/{careerCategory}', 'categoryCareers')->name('categoryCareers')->withoutMiddleware([UserMiddleware::class]);
    Route::get('/orders/{career}', 'orders')->name('orders');
    Route::post('/acceptOrder', 'acceptOrder')->name('acceptOrder');
});

Route::group([
    'prefix' => 'province',
    'controller' => ProvinceCityController::class,
    'as' => 'pc.',
    'middleware' => [UserMiddleware::class]
], function () {
    Route::post('/city', 'city')->name('city');
});
Route::group([
    'prefix' => 'careerCategory',
    'controller' => CareerCategoryController::class,
    'as' => 'cc.',
    'middleware' => [UserMiddleware::class]
], function () {
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/', 'list')->name('list');
    Route::get('/show/{careerCategory}', 'show')->name('single');
    Route::get('/edit/{careerCategory}', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::get('/delete/{careerCategory}', 'delete')->name('delete');
});
Route::group([
    'prefix' => 'carts',
    'controller' => CartController::class,
    'as' => 'cart.',
    'middleware' => [UserMiddleware::class]
], function(){
    Route::post('/store', 'store')->name('store');
    Route::get('/', 'index')->name('list');
    Route::post('/update', 'update')->name('update');
    Route::post('/delete/', 'delete')->name('delete');
    Route::post('/showCarts', 'showCarts')->name('showCarts');
    Route::post('/set', 'set')->name('set');
});
Route::group([
    'prefix'=>'orders',
    'controller'=>OrderController::class,
    'middleware' => [UserMiddleware::class],
    'as'=>'order.'
], function (){
    Route::post('/store', 'store')->name('store');
    Route::post('/show', 'show')->name('show');
    Route::post('/showItems', 'showItems')->name('showItems');
});
Route::group([
    'prefix' => 'menu',
    'controller' => MenuController::class,
    'middleware' => [UserMiddleware::class],
    'as' => 'menu.'
], function () {
    Route::get('/create/{career?}', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/show/{menu}', 'single')->name('single');
    Route::get('/customProList/{career}', 'customProMenu')->name('customProList');
    Route::get('/edit/{menu}', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::get('/delete/{menu}', 'delete')->name('delete');
    // Route::get('/showMenu/{menu}', 'showMenu')->name('showMenu');
    Route::get('/createMenu', 'createMenu')->name('createMenu');
    Route::get('/myMenu/{user}', 'user_menu')->name('user_menus');
    Route::post('/deleteAll', 'deleteAll')->name('deleteAll');
});

Route::group([
    'prefix' => 'menuCategory',
    'controller' => MenuCategoryController::class,
    'middleware' => [UserMiddleware::class],
    'as' => 'menuCat.'
], function () {
    Route::get('/create/{menu}', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/list/{menu}', 'index')->name('list');
    Route::get('/edit/{menu_category}', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::get('/delete/{menu_category}', 'delete')->name('delete');
    Route::get('/{menu}', 'menu')->name('menu');
    Route::post('/deleteAll', 'deleteAll')->name('deleteAll');
});

Route::group([
    'prefix' => 'menuItem',
    'controller' => MenuItemController::class,
    'as' => 'menuItem.',
    'middleware' => [UserMiddleware::class]
], function () {
    // Route::get('/{menu_category}', 'index')->name('list');
    Route::get('/create/{menu_category}', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/edit/{menu_item}', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::get('/delete/{menu_item}', 'delete')->name('delete');
    Route::get('/qr_codes/{menu_item}', 'qr_codes')->name('qr_codes');
    Route::get('/items/{menu_category}', 'items')->name('items');
    Route::get('/variants/{menu_item}', 'variants')->name('variants');
    Route::get('/{menu_item}', 'single')->name('single');
    Route::post('/deleteAll', 'deleteAll')->name('deleteAll');
});

// category.......................................................................
Route::get('category/create', [CategoryController::class, 'create']);
Route::post('category/store', [CategoryController::class, 'store']);
Route::get('categories', [CategoryController::class, 'index']);
Route::get('category/show/{category}', [CategoryController::class, 'show']);
Route::get('category/edit/{category}', [CategoryController::class, 'edit']);
Route::post('category/update', [CategoryController::class, 'update']);
Route::get('category/delete/{category}', [CategoryController::class, 'delete']);

// product.................................................................................
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
    'as' => 'qr.',
    'middleware' => [UserMiddleware::class]
], function () {
    Route::get('/qr-code', 'index')->name('list');
    Route::post('/delete', 'delete')->name('delete');
    Route::get('/{career}/{slug}', 'load')->name('load')->withoutMiddleware([UserMiddleware::class]);
    Route::post('/edit', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
});

// client
Route::group([
    'prefix' => 'qrcodes',
    'controller' => ClientController::class,
    'as' => 'client.'
], function () {
    Route::get('/allPages', "allPages")->name('allPages');
    Route::get('/links/{pages}/{slug?}', 'loadLink')->name('loadLink');
    Route::get('/{career}/{slug?}', 'show_menu')->name('menu');
    // Route::get('/career/{$career}', 'show_career')->name('show_career');
});
Route::get('/career/{career}', [ClientController::class, 'show_career'])->name('show_career');
// Route::get('/socialPage/{pages}', [ClientController::class, 'show_socialPage'])->name('show_socialPage');

Route::group([
    'prefix' => 'settings',
    'controller' => SettingController::class,
    'as' => 'settings.',
    'middleware' => [UserMiddleware::class]
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
    'as' => 'settings.',
    'middleware' => [UserMiddleware::class]
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
    'as' => 'settings.',
    'middleware' => [UserMiddleware::class]
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
    'as' => 'settings.',
    'middleware' => [UserMiddleware::class]
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
    'as' => 'settings.',
    'middleware' => [UserMiddleware::class]
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
    'as' => 'settings.',
    'middleware' => [UserMiddleware::class]
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

// //admin
// Route::get('/adminProfile', [adminController::class, 'adminPanel'])->name('adminPanel');
// Route::group([
//     'prefix'=>'admin',
//     'controller'=>adminController::class,
//     'as'=>'admin.'
// ], function(){
//     Route::get('/profile', 'adminProfile')->name('adminProfile');
// });

// slider
Route::group([
    'prefix' => 'slider',
    'controller' => SliderController::class,
    'as' => 'slider.',
    'middleware' => [UserMiddleware::class]
], function () {
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/sliders', 'index')->name('list');
    Route::get('/edit/{slider}', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::get('/delete/{slider}', 'delete')->name('delete');
});

// aboutUs
Route::group([
    'prefix' => 'aboutUs',
    'controller' => AboutUsController::class,
    'as' => 'aboutUs.',
    'middleware' => [UserMiddleware::class]
], function () {
    Route::get('/create_edit/{aboutUs?}', 'create_edit')->name('create_edit');
    Route::post('/updateOrcreate', 'updateOrcreate')->name('updateOrcreate');
    Route::get('/aboutUs', 'index')->name('list');
    Route::get('/delete/{aboutUs}', 'delete')->name('delete');
    Route::get('/clientList', 'clientList')->name('clientList')->withoutMiddleware([UserMiddleware::class]);
});

// favoriteCareer
Route::group([
    'prefix' => 'favoriteCareer',
    'controller' => favoriteCareerController::class,
    'as' => 'favoriteCareer.',
    'middleware' => [UserMiddleware::class]
], function () {
    Route::post('/create', 'create')->name('create')->middleware([UserMiddleware::class]);
    Route::get('/favoriteCareers', 'index')->name('list');
    Route::get('/delete/{career}', 'delete')->name('delete');
});

// favorites
Route::group([
    'prefix' => 'favorites',
    'controller' => favoritesController::class,
    'as' => 'favorite.',
], function () {
    Route::post('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/favoriteCareers', 'index')->name('list');
    Route::post('/delete', 'delete')->name('delete');
});
//favorite_categories
Route::group([
    'prefix' => 'favoriteCategories',
    'controller' => FavoriteCategoriesController::class,
    'as' => 'favoriteCategory.',
], function () {
    Route::post('/store', 'store')->name('store');
    Route::get('/favoriteCareers', 'index')->name('list');
    Route::post('/delete', 'delete')->name('delete');
});

Route::group([
    'prefix' => 'customProducts',
    'controller' => CustomProductController::class,
    'as' => 'cp.',
    'middleware' => [UserMiddleware::class]
], function () {
    Route::get('/create/{career?}', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::post('/save', 'save')->name('save');
    Route::get('/customProductList', 'index')->name('list');
    Route::get('/category_list/{custom_product?}', 'category_list')->name('category_list');
    Route::get('/show/{customProduct}', 'show')->name('single');
    Route::post('/edit', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::post('/delete/{customProduct?}', 'delete')->name('delete');
    Route::post('/deleteAll', 'deleteAll')->name('deleteAll');
});

Route::group([
    'prefix' => 'customProductVariants',
    'controller' => CustomProductVariantController::class,
    'as' => 'cpv.',
    'middleware' => [UserMiddleware::class]
], function () {
    Route::get('/create/{custom_product?}', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/variantList/{customProduct?}', 'index')->name('list');
    Route::get('/show/{cpVariants}', 'show')->name('single');
    Route::post('/edit', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::post('/delete', 'delete')->name('delete');
    Route::post('/deleteAll', 'deleteAll')->name('deleteAll');
});

// socialMedia
Route::group([
    'prefix' => 'socialMedia',
    'controller' => SocialMediaController::class,
    'as' => 'socialMedia.',
    'middleware' => [UserMiddleware::class]
], function () {
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/socialMedias', 'index')->name('list');
    Route::get('/edit/{socialMedia}', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::get('/delete/{socialMedia}', 'delete')->name('delete');
    Route::post('/deleteAll', 'deleteAll')->name('deleteAll');
});
// siteLink
Route::group([
    'prefix' => 'siteLink',
    'controller' => SiteLinkController::class,
    'as' => 'siteLink.',
    'middleware' => [UserMiddleware::class]
], function () {
    Route::get('/create/{pages}', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/medias', 'index')->name('list');
    Route::post('/edit', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::post('/delete', 'delete')->name('delete');
});
// socialAddress
Route::group([
    'prefix' => 'socialAddress',
    'controller' => SocialAddressController::class,
    'as' => 'socialAddress.',
    'middleware' => [UserMiddleware::class]
], function () {
    Route::get('/create/{pages}', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/socialAddress', 'index')->name('list');
    Route::post('/edit/{social_address}', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::post('/delete', 'delete')->name('delete');
});
// ////pages
Route::group([
    'prefix' => 'pages',
    'controller' => PagesController::class,
    'as' => 'pages.',
    'middleware' => [UserMiddleware::class]
], function () {
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/social_list', 'social_list')->name('social_list');
    Route::get('/pages', 'index')->name('list');
    Route::get('/edit/{pages}', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::get('/delete/{pages}', 'delete')->name('delete');
    Route::get('/show/{pages}', 'single')->name('single');
    Route::post('/deleteAll', 'deleteAll')->name('deleteAll');
});
Route::group([
    'prefix' => 'customProductMaterial',
    'controller' => CustomProductMaterialController::class,
    'as' => 'cpm.',
    'middleware' => [UserMiddleware::class]
], function () {
    Route::get('/create/{customCategory?}', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/materialList/{customProduct?}', 'index')->name('list');
    Route::get('/show/{cpm}', 'show')->name('single');
    Route::post('/edit', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::post('/delete', 'delete')->name('delete');
    Route::post('/deleteAll', 'deleteAll')->name('deleteAll');
});
Route::group([
    'prefix' => 'customCategories',
    'controller' => CustomCategoryController::class,
    'as' => 'custmCategory.',
    'middleware' => [UserMiddleware::class]
], function () {
    Route::get('/create/{custom_product?}', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/custmoCategoryList/{customProduct?}', 'index')->name('list');
    Route::get('/item_list/{customCategory?}', 'item_list')->name('item_list');
    Route::get('/show/{customCategory?}', 'show')->name('single');
    Route::post('/edit/{customCategory?}', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::post('/delete', 'delete')->name('delete');
    Route::post('/deleteAll', 'deleteAll')->name('deleteAll');
});

Route::group([
    'prefix' => 'ecomms',
    'controller' => EcommController::class,
    'as' => 'ecomm.',
    'middleware' => [UserMiddleware::class]
], function () {
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/list', 'user_ecomms')->name('ecomms')->withoutMiddleware([UserMiddleware::class]);
    Route::get('/edit/{ecomm}', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::get('/delete/{ecomm}', 'delete')->name('delete');
    Route::get('/ecomms', 'index')->name('list');
    Route::get('/show/{ecomm}', 'single')->name('single')->withoutMiddleware([UserMiddleware::class]);
    Route::get('/ecomm_menu/{ecomm}', 'ecomm_menu')->name('ecomm_menu')->withoutMiddleware([UserMiddleware::class]);
    Route::get('/ecomm_single_menu/{ecomm}', 'ecomm_single_menu')->name('ecomm_single_menu')->withoutMiddleware([UserMiddleware::class]);
});

Route::group(['prefix' => 'ecomm_category',
        'controller' => EcommCategoryController::class,
        'as' => 'ecomm_category.',
        'middleware' => [UserMiddleware::class]], function () {
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/index', 'index')->name('index');
    Route::get('/show/{ecomm_category}', 'show')->name('show');
    Route::get('/edit/{ecomm_category}/', 'edit')->name('edit');
    Route::get('/edit_ecomm_categories/{ecomm_category}/', 'edit_ecomm_categories')->name('edit_ecomm_categories');
    Route::get('/ecomm_categories/{ecomm}', 'ecomm_categories')->name('ecomm_categories');
    Route::post('/update', 'update')->name('update');
    Route::post('/update_ecomm_categories', 'update_ecomm_categories')->name('update_ecomm_categories');
    Route::get('/delete/{ecomm_category}', 'delete')->name('delete');
    Route::post('/getEcommCategories', 'getEcommCategories')->name('getEcommCategories');
});
Route::group([
    'prefix' => 'ecomm_product',
    'controller' => EcommProductController::class,
    'as' => 'ecomm_product.',
    'middleware' => [UserMiddleware::class]
], function () {
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/index', 'index')->name('index');
    Route::get('/show/{ecomm_product}', 'show')->name('show');
    Route::get('/edit/{ecomm_product}', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::get('/delete/{ecomm_product}', 'delete')->name('delete');
    Route::get('/category_product/{ecomm_category}', 'category_product')->name('category_product');
    Route::post('/menu_ecomm_category_product', 'menu_ecomm_category_product')->name('menu_ecomm_category_product');
});
Route::group([
    'prefix' => 'ecomm_qrCode',
    'controller' => EcommQrCodeController::class,
    'as' => 'ecomm_qr.'
], function () {
    Route::get('/{ecomm}/{slug}', 'load')->name('load');
});

///contactUs
Route::group([
    'prefix' => 'contactUs',
    'controller' => contactUsController::class,
    'as' => 'contactUs.',
    'middleware' => [UserMiddleware::class]
], function () {
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/myMessage', 'myMessage')->name('myMessage');
    Route::get('/contactUs', 'index')->name('list');
    Route::get('/single/{contactUs}', 'single')->name('single');
    Route::get('/clientSingle/{contactUs}', 'clientSingle')->name('show');
    Route::get('/edit/{contactUs}', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::get('/delete/{contactUs}', 'delete')->name('delete');
    Route::post('/deleteAll', 'deleteAll')->name('deleteAll');
});

Route::fallback(function () {
    return view('404');
});
