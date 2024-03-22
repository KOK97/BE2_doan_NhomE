<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('layout');
});

Route::get('/wishlist', function () {
    return view('wishlist');
});
