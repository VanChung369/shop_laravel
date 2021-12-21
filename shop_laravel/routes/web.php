<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BotManController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// login admin
route::get('/admin', 'App\Http\Controllers\AdminController@loginAdmin');
route::post('/admin', 'App\Http\Controllers\AdminController@postloginAdmin');

// home
route::get('/admin/home', [
    'as' => 'admin.home',
    'uses' => 'App\Http\Controllers\AdminhomeController@index',
]);

Route::prefix('admin')->group(function () {
    // tao duong dan voi prefix category/create
    //category
    Route::prefix('category')->group(function () {
        route::get('/', [
            'as' => 'category.index',
            'uses' => 'App\Http\Controllers\AdminCategoryController@index',
        ]);
        Route::get('/create', [
            'as' => 'category.create', // ten dinh danh
            'uses' => 'App\Http\Controllers\AdminCategoryController@create', // vao controller category truy cap vao phuong thuc create
        ]);
        Route::post('/store', [
            'as' => 'category.store',
            'uses' => 'App\Http\Controllers\AdminCategoryController@store',
        ]);
        Route::get('/delete/{id}', [
            'as' => 'category.delete',
            'uses' => 'App\Http\Controllers\AdminCategoryController@delete',
        ]);
        Route::get('/edit/{id}', [
            'as' => 'category.edit',
            'uses' => 'App\Http\Controllers\AdminCategoryController@edit',
        ]);
        route::post('/update/{id}', [
            'as' => 'category.update',
            'uses' => 'App\Http\Controllers\AdminCategoryController@update',
        ]);
    });
    // menu
    Route::prefix('menu')->group(function () {
        route::get('/', [
            'as' => 'menu.index',
            'uses' => 'App\Http\Controllers\AdminMenuController@index',
        ]);
        Route::get('/create', [
            'as' => 'menu.create',
            'uses' => 'App\Http\Controllers\AdminMenuController@create',
        ]);
        Route::post('/store', [
            'as' => 'menu.store',
            'uses' => 'App\Http\Controllers\AdminMenuController@store',
        ]);
        route::get('/edit/{id}', [
            'as' => 'menu.edit',
            'uses' => 'App\Http\Controllers\AdminMenuController@edit',
        ]);
        route::post('/update/{id}', [
            'as' => 'menu.update',
            'uses' => 'App\Http\Controllers\AdminMenuController@update',
        ]);
        Route::get('/delete/{id}', [
            'as' => 'menu.delete',
            'uses' => 'App\Http\Controllers\AdminMenuController@delete',
        ]);
    });

    // Product
    Route::prefix('product')->group(function () {
        Route::get('/', [
            'as' => 'product.index',
            'uses' => 'App\Http\Controllers\AdminProductController@index'
        ]);
        Route::get('/create', [
            'as' => 'product.create',
            'uses' => 'App\Http\Controllers\AdminProductController@create'
        ]);
        Route::get('/search', [
            'as' => 'product.search',
            'uses' => 'App\Http\Controllers\AdminProductController@search'
        ]);
    
        Route::post('/store', [
            'as' => 'product.store',
            'uses' => 'App\Http\Controllers\AdminProductController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'product.edit',
            'uses' => 'App\Http\Controllers\AdminProductController@edit'

        ]);
        Route::post('/update/{id}', [
            'as' => 'product.update',
            'uses' => 'App\Http\Controllers\AdminProductController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'product.delete',
            'uses' => 'App\Http\Controllers\AdminProductController@delete'
        ]);
    });
    // Slider
    Route::prefix('slider')->group(function () {
        Route::get('/', [
            'as' => 'slider.index',
            'uses' => 'App\Http\Controllers\AdminSliderController@index'
        ]);

        Route::get('/create', [
            'as' => 'slider.create',
            'uses' => 'App\Http\Controllers\AdminSliderController@create'
        ]);

        Route::post('/store', [
            'as' => 'slider.store',
            'uses' => 'App\Http\Controllers\AdminSliderController@store'
        ]);

        Route::get('/edit/{id}', [
            'as' => 'slider.edit',
            'uses' => 'App\Http\Controllers\SliderAdminController@edit'
        ]);
        Route::post('/update/{id}', [
            'as' => 'slider.update',
            'uses' => 'App\Http\Controllers\AdminSliderController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'slider.delete',
            'uses' => 'App\Http\Controllers\AdminSliderController@delete'
        ]);
    });
    // Settings
    Route::prefix('settings')->group(function () {
        Route::get('/', [
            'as' => 'settings.index',
            'uses' => 'App\Http\Controllers\AdminSettingController@index'
        ]);

        Route::get('/create', [
            'as' => 'settings.create',
            'uses' => 'App\Http\Controllers\AdminSettingController@create'
        ]);
        Route::post('/store', [
            'as' => 'settings.store',
            'uses' => 'App\Http\Controllers\AdminSettingController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'settings.edit',
            'uses' => 'App\Http\Controllers\AdminSettingController@edit'
        ]);
        Route::post('/update/{id}', [
            'as' => 'settings.update',
            'uses' => 'App\Http\Controllers\AdminSettingController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'settings.delete',
            'uses' => 'App\Http\Controllers\AdminSettingController@delete'
        ]);
    });
    // User
    Route::prefix('users')->group(function () {
        Route::get('/', [
            'as' => 'users.index',
            'uses' => 'App\Http\Controllers\AdminUserController@index'
        ]);
        Route::get('/create', [
            'as' => 'users.create',
            'uses' => 'App\Http\Controllers\AdminUserController@create'
        ]);
        Route::post('/store', [
            'as' => 'users.store',
            'uses' => 'App\Http\Controllers\AdminUserController@store'
        ]);

        Route::get('/edit/{id}', [
            'as' => 'users.edit',
            'uses' => 'App\Http\Controllers\AdminUserController@edit'
        ]);

        Route::post('/update/{id}', [
            'as' => 'users.update',
            'uses' => 'App\Http\Controllers\AdminUserController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'users.delete',
            'uses' => 'App\Http\Controllers\AdminUserController@delete'
        ]);
    });
    //roles
    Route::prefix('roles')->group(function () {
        Route::get('/', [
            'as' => 'roles.index',
            'uses' => 'App\Http\Controllers\AdminRoleController@index'
        ]);
        Route::get('/create', [
            'as' => 'roles.create',
            'uses' => 'App\Http\Controllers\AdminRoleController@create'
        ]);
        Route::post('/store', [
            'as' => 'roles.store',
            'uses' => 'App\Http\Controllers\AdminRoleController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'roles.edit',
            'uses' => 'App\Http\Controllers\AdminRoleController@edit'
        ]);

        Route::post('/update/{id}', [
            'as' => 'roles.update',
            'uses' => 'App\Http\Controllers\AdminRoleController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'roles.delete',
            'uses' => 'App\Http\Controllers\AdminRoleController@delete'
        ]);
    });
    // order
    Route::prefix('order')->group(function () {
        Route::get('/', [
            'as' => 'order.index',
            'uses' => 'App\Http\Controllers\AdminOrderController@index'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'order.edit',
            'uses' => 'App\Http\Controllers\AdminOrderController@edit'
        ]);

        Route::post('/update/{id}', [
            'as' => 'order.update',
            'uses' => 'App\Http\Controllers\AdminOrderController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'order.delete',
            'uses' => 'App\Http\Controllers\AdminOrderController@delete'
        ]);
    });
    //comment
    Route::prefix('comment')->group(function () {
        Route::get('/', [
            'as' => 'comment.index',
            'uses' => 'App\Http\Controllers\commentController@index'
        ]);
        Route::get('/update/{id}', [
            'as' => 'comment.update',
            'uses' => 'App\Http\Controllers\commentController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'comment.delete',
            'uses' => 'App\Http\Controllers\commentController@delete'
        ]);
    });
    //contact
    Route::prefix('contact')->group(function () {
        Route::get('/', [
            'as' => 'contact.index',
            'uses' => 'App\Http\Controllers\ContactController@index'
        ]);
        Route::post('/store', [
            'as' => 'contact.store',
            'uses' => 'App\Http\Controllers\ContactController@store'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'contact.delete',
            'uses' => 'App\Http\Controllers\ContactController@delete'
        ]);
    });
    //sale
    Route::prefix('sale')->group(function () {
        Route::get('/', [
            'as' => 'sale.index',
            'uses' => 'App\Http\Controllers\AdminSaleController@index'
        ]);
        Route::get('/create', [
            'as' => 'sale.create',
            'uses' => 'App\Http\Controllers\AdminSaleController@create'
        ]);
        Route::post('/store', [
            'as' => 'sale.store',
            'uses' => 'App\Http\Controllers\AdminSaleController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'sale.edit',
            'uses' => 'App\Http\Controllers\AdminSaleController@edit'

        ]);
        Route::post('/update/{id}', [
            'as' => 'sale.update',
            'uses' => 'App\Http\Controllers\AdminSaleController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'sale.delete',
            'uses' => 'App\Http\Controllers\AdminSaleController@delete'
        ]);
    });

});
// frontend
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
Route::post('/search', [
    'as' => 'search',
    'uses' => 'App\Http\Controllers\UserSearchController@search'
]);
Route::get('/category/{slug}/{id}', [
    'as' => 'category.product',
    'uses' => 'App\Http\Controllers\UserCategoryController@index'
]);
//Product
Route::get('/Product/chi-tiet-san-pham/{slug}/{id}', [
    'as' => 'UserProduct.index',
    'uses' => 'App\Http\Controllers\UserProductController@index'
]);
//cart
Route::post('/save-cart', [
    'as' => 'save-cart',
    'uses' => 'App\Http\Controllers\UsercartController@savecart'
]);
Route::get('/show-cart', [
    'as' => 'show-cart',
    'uses' => 'App\Http\Controllers\UsercartController@showcart'
]);
Route::post('/update-cart-quantity', [
    'as' => 'update-cart-quantity',
    'uses' => 'App\Http\Controllers\UsercartController@updatecart'
]);
Route::get('/delete-to-carty/{id}', [
    'as' => 'delete-to-cart',
    'uses' => 'App\Http\Controllers\UsercartController@deletecart'
]);
Route::get('/status', [
    'as' => 'status',
    'uses' => 'App\Http\Controllers\UsercartController@status'
]);
//checkout
Route::get('/login-checkout', [
    'as' => 'login-checkout',
    'uses' => 'App\Http\Controllers\UsercheckoutController@logincheckout'
]);
Route::get('/logout-checkout', [
    'as' => 'logout-checkout',
    'uses' => 'App\Http\Controllers\UsercheckoutController@logoutcheckout'
]);
Route::post('/login-customer', [
    'as' => 'login-customer',
    'uses' => 'App\Http\Controllers\UsercheckoutController@logincustomer'
]);
Route::post('/add-customer', [
    'as' => 'add-customer',
    'uses' => 'App\Http\Controllers\UsercheckoutController@addcustomer'
]);
Route::get('/checkout', [
    'as' => 'checkout',
    'uses' => 'App\Http\Controllers\UsercheckoutController@checkout'
]);
Route::post('/save-checkout', [
    'as' => 'save-checkout',
    'uses' => 'App\Http\Controllers\UsercheckoutController@savecheckout'
]);
//comment
Route::post('/comment', [
    'as' => 'comment',
    'uses' => 'App\Http\Controllers\commentController@comment'
]);
Route::get('/submit-comment', [
    'as' => 'submit-comment',
    'uses' => 'App\Http\Controllers\commentController@submitcomment'
]);
//contact
Route::get('/contact', [
    'as' => 'contact',
    'uses' => 'App\Http\Controllers\ContactController@contact'
]);
//botman
Route::match(['get', 'post'], 'botman', [BotManController::class, 'handle']);