<?php

use Illuminate\Support\Facades\Request;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OrderBasketController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FeedbackMailController;
use App\Http\Controllers\RelatedProductController;
use App\Http\Controllers\CookieController;
use App\Http\Controllers\ApiController;

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
// Установка куки user_id
Route::get('/setcookie', [CookieController::class, 'getUserID']);

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
    require '../routes/admin.php';
});

