<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('Book Store');

### ADMIN ###
Route::GET('/admin', function () {
    return view('admin.index');
})->name('admin.index');


### CATEGORY ###
Route::GET('/category', [CategoryController::class, 'index'])->name('category.index');
Route::GET('/create-category', [CategoryController::class, 'create'])->name('category.create');
Route::POST('/store-category', [CategoryController::class, 'store'])->name('category.store');
Route::GET('/edit-category/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::POST('/update-category/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::POST('/delete-category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

//Wishlist
Route::get('wishlist', [WishlistController::class, 'index'])->name('productWishlist');
