<?php

use Illuminate\Support\Facades\Request;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DelieveryController;
use App\Http\Controllers\OrderBasketController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FeedbackMailController;
use App\Http\Controllers\RelatedProductController;
use App\Http\Controllers\CookieController;


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

/*main page*/
//TODO Сделать рендер главной страницы в соответствующем контроллере + создавать куки  user_id при входе
Route::get('/', [ProductController::class, 'product_list_popularity'])->name('home');
Route::get('/', [ProductController::class, 'product_list_sales'])->name('home');

/*PRODUCT*/
Route::get('/catalog/{id}', [ProductController::class, 'product_detail'])->name('detail-product');
Route::post('/catalog/buy', [ProductController::class, 'product_add_to_cart'])->name('detail-product-submit');
// catalog product
Route::get('/catalog', [ProductController::class, 'product_catalog_list'])->name('catalog-product');
Route::post('/catalog/filterByCategory', [ProductController::class, 'category_filter']);

/*CART*/
Route::post('/catalog/condition', [CartController::class, 'cart_condition'])->name('cart-condition');
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::post('/cart/render', [CartController::class, 'cartRenderAction'])->name('cart-render');
Route::post('/cart/submit', [OrderController::class, 'orderCreate'])->name('order-submit');
Route::post('/cart/update', [CartController::class, 'cartRenderAction'])->name('cart-update');

/*ADDITIONAL PAGES*/
Route::get('/contact', function () {
    return view('templates.pages.contact');
})->name('contact');

Route::get('/about', function () {
    return view('templates.pages.about');
})->name('about');

Route::get('/delivery', function () {
    return view('templates.pages.delivery');
})->name('delivery');

Route::get('/pay', function () {
    return view('templates.pages.pay');
})->name('pay');

// Mails actions
Route::post('/contact/submit', [FeedbackMailController::class, 'feedback_submit']);

Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*ADMIN PANEL ROUTES*/
Route::group(['middleware' => ['role:admin']], function () {
// main admin page
    Route::get('/admin', function () {
        return view('admin.main');
    })->name('home-admin');

    // product-content
    Route::get('/admin/product', [ProductController::class, 'product_list_admin'])->name('product-admin');

    Route::get('/admin/product/edit/{id}', [ProductController::class, 'product_edit_page'])->name('product-edit-admin');

    Route::post('/admin/product/edit/{id}/submit', [ProductController::class, 'product_edit'])->name('product_edit');

    Route::get('/admin/product/add', function () {
        return view('admin.product.product-add');
    })->name('product-add-admin');

    Route::post('/admin/product/add/submit', [ProductController::class, 'add_product']);

    // category
    Route::get('/admin/category', [CategoryController::class, 'category_list'])->name('category-admin');

    Route::get('/admin/category/add', function () {
        return view('admin.product.category-add');
    })->name('category-add-admin');

    Route::post('/admin/category/add/submit', [CategoryController::class, 'category_add']);

    // delievery
    Route::get('/admin/delivery', [DelieveryController::class, 'delievery_list'])->name('delievery-admin');
    Route::get('/admin/delivery/add', [DelieveryController::class, 'delievery_add'])->name('delievery-add-admin');
    Route::post('/admin/delivery/add/submit', [DelieveryController::class, 'delievery_add_submit'])->name('delievery-add-submit-admin');

    //users-content
    Route::get('/admin/users', function () {
        return view('admin.user.users-content');
    })->name('users-admin');

    Route::get('/admin/add-user', function () {
        return view('admin.user.user-add');
    })->name('users-admin-add');

});

