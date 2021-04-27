<?php
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;

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

Route::get('/', [ProductController::class, 'product_list'])->name('home');

/*PRODUCT*/
// product pages
Route::get('/shop/{id}', [ProductController::class, 'product_detail'])->name('detail-product');
Route::post('/shop/{id}/buy', [ProductController::class, 'product_add_to_cart'])->name('detail-product-submit');

/*CART*/

// cart condition
Route::post('/shop/condition', [CartController::class, 'cart_condition'])->name('cart-condition');

// cart page
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::post('/cart/render', [CartController::class, 'cart_render'])->name('cart-render');

// cart delete
Route::post('/cart/update', [CartController::class, 'cart_update'])->name('cart-update');

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


//category
    Route::get('/admin/category', [CategoryController::class, 'category_list'])->name('category-admin');

    Route::get('/admin/category/add', function () {
        return view('admin.product.category-add');
    })->name('category-add-admin');

    Route::post('/admin/category/add/submit', [CategoryController::class, 'category_add']);

//users-content
    Route::get('/admin/users', function () {
        return view('admin.user.users-content');
    })->name('users-admin');

    Route::get('/admin/add-user', function () {
        return view('admin.user.user-add');
    })->name('users-admin-add');

});

