<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WishlistController;

Route::get('/', function () {
    return view('layout');
});


//Wishlist
Route::get('wishlist',[WishlistController::class, 'index'])->name('productWishlist');