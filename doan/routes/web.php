<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

### ADMIN ###
    Route::GET('/admin', function () {
        return view('admin.index');
    })->name('admin.index');
    //User
    //Product
    //Category
    //Author
    //...