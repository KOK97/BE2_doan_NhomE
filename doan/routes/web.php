<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

Route::get('/', [HomeController::class, 'index'])->name('Book Store');

### ADMIN ###
Route::GET('/admin', function () {
    return view('admin.index');
})->name('admin.index');


### CATEGORY ###
Route::GET('/category', [CategoryController::class, 'index'])->name('category.index');
Route::GET('/search', [CategoryController::class, 'search'])->name('category.search');
Route::GET('/create-category', [CategoryController::class, 'create'])->name('category.create');
Route::POST('/store-category', [CategoryController::class, 'store'])->name('category.store');
Route::GET('/edit-category/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::POST('/update-category/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::POST('/delete-category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
### PRODUCT ###
Route::GET('/listproduct',[ProductController::class,'listProduct'])->name('listProduct');
Route::GET('/createproduct',[ProductController::class,'showAddProduct'])->name('createProduct');
Route::POST('/createproduct',[ProductController::class,'createProduct'])->name('saveProduct');
Route::GET('/editproducts/{id}',[ProductController::class,'getDataEdit'])->name('getdataedit');
Route::PUT('/updateproducts/{id}', [ProductController::class,'updateProduct'])->name('updateProduct');
Route::DELETE('/destroyproduct/{id}', [ProductController::class,'destroy'])->name('destroyProduct');

//Wishlist
Route::GET('/wishlist', [WishlistController::class, 'index'])->name('product.wishlist');
Route::POST('/add-wishlist', [WishlistController::class, 'add'])->name('product.wishlist.add');


