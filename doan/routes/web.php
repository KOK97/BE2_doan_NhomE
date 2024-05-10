<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
// use App\Http\Controllers\AccountController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\AuthorController;

Route::get('/', function () {
    return view('content.home');
})->name('Book Store');

//Account
//Login
Route::GET('/login', function () {
    return view('auth.login');
})->name('auth.login');
// Route::POST('/login', [AccountController::class, 'customLogin'])->name('auth.custom.login');
//Register
Route::GET('/register')->name('auth.register');
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

