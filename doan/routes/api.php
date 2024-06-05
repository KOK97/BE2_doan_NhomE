<?php

use App\Http\Controllers\WishlistController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::middleware('auth:sanctum')->group(function () {
//     Route::get('/wishlist', [WishlistController::class, 'index']);
//     Route::post('/wishlist', [WishlistController::class,'add-wishlist']);
// });