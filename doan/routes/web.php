<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\AuthorController;

Route::get('/', function () {
    return view('content.home');
})->name('Book Store');
Route::get('/', [HomeController::class, 'index'])->name('Book Store');

### ADMIN ###
Route::GET('/admin', function () {
    return view('admin.index');
})->name('admin.index');


### CATEGORY ###
Route::GET('/category', [CategoryController::class, 'index'])->name('category.index');
Route::GET('/search-category', [CategoryController::class, 'search'])->name('category.search');
Route::GET('/create-category', [CategoryController::class, 'create'])->name('category.create');
Route::POST('/store-category', [CategoryController::class, 'store'])->name('category.store');
Route::GET('/edit-category/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::POST('/update-category/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::POST('/delete-category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

//Wishlist
Route::GET('/wishlist', [WishlistController::class, 'index'])->name('product.wishlist');
Route::POST('/add-wishlist', [WishlistController::class, 'add'])->name('product.wishlist.add');

### USER ###
Route::GET('/user', [UserController::class, 'index'])->name('user.index');
Route::GET('/search-user', [UserController::class, 'search'])->name('user.search');
Route::GET('/create-user', [UserController::class, 'create'])->name('user.create');
Route::POST('/store-user', [UserController::class, 'store'])->name('user.store');
Route::GET('/edit-user/{user_id}', [UserController::class, 'edit'])->name('user.edit');
Route::POST('/update-user/{user_id}', [UserController::class, 'update'])->name('user.update');
Route::POST('/delete-user/{user_id}', [UserController::class, 'destroy'])->name('user.destroy');

//Account
//Login
// Route::GET('/login', [AccountController::class, 'login'])->name('auth.login');
// Route::POST('/login', [AccountController::class, 'customLogin'])->name('auth.custom.login');
// //Register
// Route::GET('/register', [AccountController::class, 'register'])->name('auth.register');
// Route::POST('/register', [AccountController::class, 'customRegister'])->name('auth.custom.register');
//Log out
// Route::GET('logout', [AccountController::class, 'logout'])->name('auth.logout');

### ADMIN ###
Route::prefix('/')->middleware('IsAdmin')->group(function () {
    Route::GET('/admin', [UserController::class, 'index'])->name('admin.index');
    ### USER ###
    Route::GET('/user', [UserController::class, 'index'])->name('user.index');
    Route::GET('/create-user', [UserController::class, 'create'])->name('user.create');
    Route::POST('/store-user', [UserController::class,'store'])->name('user.store');
    Route::GET('/edit-user/{user_id}', [UserController::class, 'edit'])->name('user.edit');
    Route::POST('/update-user/{user_id}', [UserController::class, 'update'])->name('user.update');
    Route::POST('/delete-user/{user_id}', [UserController::class, 'destroy'])->name('user.destroy');
});


### PRODUCT ###
Route::GET('/listproduct',[ProductController::class,'listProduct'])->name('listProduct');
//create
Route::GET('/createproduct',[ProductController::class,'showAddProduct'])->name('createProduct');
Route::POST('/createproduct',[ProductController::class,'createProduct'])->name('saveProduct');
//edit
Route::GET('/editproducts/{id}',[ProductController::class,'getDataEdit'])->name('getdataeditProduct');
Route::PUT('/updateproducts/{id}', [ProductController::class,'updateProduct'])->name('updateProduct');
//dele
Route::DELETE('/destroyproduct/{id}', [ProductController::class,'destroy'])->name('destroyProduct');
//show 
Route::GET('/shop',[ProductController::class,'showProductByCategory'])->name('show.shop');


### SALE ###
Route::GET('/listsale',[SaleController::class,'listSale'])->name('listSale');
//create
Route::GET('/createsale',[SaleController::class,'showAddSale'])->name('createSale');
Route::POST('/createsale',[SaleController::class,'createSale'])->name('saveSale');
//edit
Route::GET('/editsale/{id}',[SaleController::class,'getDataEdit'])->name('getdataeditSale');
Route::PUT('/updatesale/{id}', [SaleController::class,'updateSale'])->name('updateSale');
//dele
Route::DELETE('/destroysale/{id}', [SaleController::class,'destroySale'])->name('destroySale');

### AUTHOR ###
Route::GET('/listauthor',[AuthorController::class,'listAuthor'])->name('listAuthor');
//create
Route::GET('/createauthor',[AuthorController::class,'showAddAuthor'])->name('createAuthor');
Route::POST('/createauthor',[AuthorController::class,'createAuthor'])->name('saveAuthor');
//edit
Route::GET('/editauthor/{id}',[AuthorController::class,'getDataEditAuthor'])->name('getDataEditAuthor');
Route::PUT('/updateauthor/{id}', [AuthorController::class,'updateAuthor'])->name('updateAuthor');
//dele
Route::DELETE('/destroyauthor/{id}', [AuthorController::class,'destroyAuthor'])->name('destroyAuthor');

// Route::GET('logout', [AccountController::class, 'logout'])->name('auth.logout');
