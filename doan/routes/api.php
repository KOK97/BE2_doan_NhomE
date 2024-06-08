<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\WishlistController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('')->group(function () {
    Route::get('/login', [AccountController::class, 'login'])->name('api.auth.login');
    Route::post('/login', [AccountController::class, 'customLogin'])->name('api.auth.custom.login');
    Route::get('/register', [AccountController::class, 'register'])->name('api.auth.register');
    Route::post('/register', [AccountController::class, 'customRegister'])->name('api.auth.custom.register');
    Route::post('/logout', [AccountController::class, 'logout'])->name('api.auth.logout');

    Route::middleware('auth:sanctum')->group(function () {
        //Account
        Route::get('/account', [AccountController::class, 'account'])->name('api.auth.account');
        Route::get('/profile', [AccountController::class, 'profile'])->name('api.auth.profile');
        Route::get('/product-recent', [AccountController::class, 'productRecent'])->name('api.auth.product.recent');
        //Wishlist
        Route::get('/wishlist', [WishlistController::class, 'index'])->name('api.wishlist.index');
        Route::get('/wishlist/search', [WishlistController::class, 'search'])->name('api.wishlist.search');
        Route::post('/add-wishlist', [WishlistController::class, 'add'])->name('api.wishlist.add');
        Route::delete('/destroy', [WishlistController::class, 'destroy'])->name('api.wishlist.destroy');
        Route::delete('/remove-all', [WishlistController::class, 'removeAll'])->name('api.wishlist.removeAll');
    });
});
