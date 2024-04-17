<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WishlistController;

Route::get('/', function () {
    return view('layout');
});

<<<<<<< HEAD

//Wishlist
Route::get('wishlist',[WishlistController::class, 'index'])->name('productWishlist');
=======
### ADMIN ###
    Route::GET('/admin', function () {
        return view('admin.index');
    })->name('admin.index');
    //User
    //Product
    //Category
    //Author
    //...
>>>>>>> master
