<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ReviewController;


Route::get('/', [HomeController::class, 'showProductByCategory'])->name('Book Store');

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
    Route::GET('/editproducts/{id}', [ProductController::class, 'getDataEdit'])->name('getdataeditProduct');
    Route::PUT('/updateproducts/{id}', [ProductController::class, 'updateProduct'])->name('updateProduct');
    Route::DELETE('/destroyproduct/{id}', [ProductController::class, 'destroy'])->name('destroyProduct');
    Route::GET('/search-product', [ProductController::class, 'search'])->name('admin.product.search');

    ### USER ###
    Route::GET('/user', [UserController::class, 'index'])->name('user.index');
    Route::GET('/search-user', [UserController::class, 'search'])->name('user.search');
    Route::GET('/create-user', [UserController::class, 'create'])->name('user.create');
    Route::POST('/store-user', [UserController::class, 'store'])->name('user.store');
    Route::GET('/edit-user/{user_id}', [UserController::class, 'edit'])->name('user.edit');
    Route::POST('/update-user/{user_id}', [UserController::class, 'update'])->name('user.update');
    Route::POST('/delete-user/{user_id}', [UserController::class, 'destroy'])->name('user.destroy');

    ### SALE ###
    Route::GET('/listsale', [SaleController::class, 'listSale'])->name('listSale');
    Route::GET('/createsale', [SaleController::class, 'showAddSale'])->name('createSale');
    Route::POST('/createsale', [SaleController::class, 'createSale'])->name('saveSale');
    Route::GET('/editsale/{id}', [SaleController::class, 'getDataEdit'])->name('getdataeditSale');
    Route::PUT('/updatesale/{id}', [SaleController::class, 'updateSale'])->name('updateSale');
    Route::DELETE('/destroysale/{id}', [SaleController::class, 'destroySale'])->name('destroySale');

    ### AUTHOR ###
    Route::GET('/listauthor', [AuthorController::class, 'listAuthor'])->name('listAuthor');
    Route::GET('/createauthor', [AuthorController::class, 'showAddAuthor'])->name('createAuthor');
    Route::POST('/createauthor', [AuthorController::class, 'createAuthor'])->name('saveAuthor');
    Route::GET('/editauthor/{id}', [AuthorController::class, 'getDataEditAuthor'])->name('getDataEditAuthor');
    Route::PUT('/updateauthor/{id}', [AuthorController::class, 'updateAuthor'])->name('updateAuthor');
    Route::DELETE('/destroyauthor/{id}', [AuthorController::class, 'destroyAuthor'])->name('destroyAuthor');
    Route::GET('/search-author', [AuthorController::class, 'search'])->name('author.search');
});

Route::prefix('/')->middleware('loginRequired')->group(function () {
    //Dashboard
    //Account
    Route::GET('/dashboard', [AccountController::class, 'account'])->name('auth.dashboard');
    Route::GET('/dashboard/my-profile', [AccountController::class, 'profile'])->name('auth.profile');
    //Product recent
    Route::GET('/dashboard/product-recent', [AccountController::class, 'productRecent'])->name('auth.productrecent');
    //Wishlist
    Route::GET('/wishlist', [WishlistController::class, 'index'])->name('product.wishlist');
    Route::GET('/wishlist/search/', [WishlistController::class, 'search'])->name('product.wishlist.search');
    Route::POST('/add-wishlist', [WishlistController::class, 'add'])->name('product.wishlist.add');
    Route::POST('/destroy-wishlist', [WishlistController::class, 'destroy'])->name('product.wishlist.destroy');
    Route::POST('/remove-all', [WishlistController::class, 'removeAll'])->name('product.wishlist.remove-all');

    //Comment
    Route::POST('product/detailproduct/{id}', [ReviewController::class, 'store'])->name('product.comment');
    Route::DELETE('/destroyComment/{id}', [ReviewController::class, 'destroy'])->name('destroy.comment');
});


// Login
Route::GET('/login', [AccountController::class, 'login'])->name('auth.login');
Route::POST('/login', [AccountController::class, 'customLogin'])->name('auth.custom.login');
//Register
Route::GET('/register', [AccountController::class, 'register'])->name('auth.register');
Route::POST('/register', [AccountController::class, 'customRegister'])->name('auth.custom.register');
//Log out
Route::GET('logout', [AccountController::class, 'logout'])->name('auth.logout');

//Show detail
Route::GET('product/detailproduct/{id}', [ProductController::class, 'showDetail'])->name('show.detail');
//Search
Route::GET('product/search', [HomeController::class, 'search'])->name('product.search');
//Filter
//Category
Route::get('product/filter/category/{id}', [HomeController::class, 'filterByCategory'])->name('product.category.filter');