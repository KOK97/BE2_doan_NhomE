<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

Route::get('/', [HomeController::class, 'index'])->name('Book Store');

### ADMIN ###
Route::prefix('/')->middleware('isAdmin')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    ### CATEGORY ###
    Route::GET('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::GET('/search-category', [CategoryController::class, 'search'])->name('category.search');
    Route::GET('/create-category', [CategoryController::class, 'create'])->name('category.create');
    Route::POST('/store-category', [CategoryController::class, 'store'])->name('category.store');
    Route::GET('/edit-category/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::POST('/update-category/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::POST('/delete-category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

    ### PRODUCT ###
    Route::GET('/listproduct', [ProductController::class, 'listProduct'])->name('listProduct');
    Route::GET('/createproduct', [ProductController::class, 'showAddProduct'])->name('createProduct');
    Route::POST('/createproduct', [ProductController::class, 'createProduct'])->name('saveProduct');
    Route::GET('/editproducts/{id}', [ProductController::class, 'getDataEdit'])->name('getdataedit');
    Route::PUT('/updateproducts/{id}', [ProductController::class, 'updateProduct'])->name('updateProduct');
    Route::DELETE('/destroyproduct/{id}', [ProductController::class, 'destroy'])->name('destroyProduct');

    ### USER ###
    Route::GET('/user', [UserController::class, 'index'])->name('user.index');
    Route::GET('/search-user', [UserController::class, 'search'])->name('user.search');
    Route::GET('/create-user', [UserController::class, 'create'])->name('user.create');
    Route::POST('/store-user', [UserController::class, 'store'])->name('user.store');
    Route::GET('/edit-user/{user_id}', [UserController::class, 'edit'])->name('user.edit');
    Route::POST('/update-user/{user_id}', [UserController::class, 'update'])->name('user.update');
    Route::POST('/delete-user/{user_id}', [UserController::class, 'destroy'])->name('user.destroy');
});


//Account
//Login
Route::GET('/login', [AccountController::class, 'login'])->name('auth.login');
Route::POST('/login', [AccountController::class, 'customLogin'])->name('auth.custom.login');
//Register
Route::GET('/register', [AccountController::class, 'register'])->name('auth.register');
Route::POST('/register', [AccountController::class, 'customRegister'])->name('auth.custom.register');
//Log out
Route::GET('logout', [AccountController::class, 'logout'])->name('auth.logout');

//Wishlist
Route::GET('/wishlist', [WishlistController::class, 'index'])->name('product.wishlist');
Route::POST('/add-wishlist', [WishlistController::class, 'add'])->name('product.wishlist.add');
