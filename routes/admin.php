<?php

use App\Http\Controllers\ProductController,
    App\Http\Controllers\CategoryController,
    App\Http\Controllers\DelieveryController;

Route::get('/admin', function () {
    return view('admin.main');
})->name('home-admin');

// product-content
Route::get('/admin/product', [ProductController::class, 'product_list_admin'])->name('product-admin');
Route::get('/admin/product/edit/{id}', [ProductController::class, 'product_edit_page'])->name('product-edit-admin');
Route::post('/admin/product/edit/{id}/submit', [ProductController::class, 'product_edit'])->name('product_edit');
Route::post('/admin/product/add/submit', [ProductController::class, 'add_product']);
Route::get('/admin/product/{id}/delete', [ProductController::class, 'product_delete'])->name('product-delete');

Route::get('/admin/product/add', function () {
    return view('admin.product.product-add');
})->name('product-add-admin');

// category
Route::get('/admin/category', [CategoryController::class, 'category_list'])->name('category-admin');
Route::post('/admin/category/add/submit', [CategoryController::class, 'category_add']);

Route::get('/admin/category/add', function () {
    return view('admin.product.category-add');
})->name('category-add-admin');

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
