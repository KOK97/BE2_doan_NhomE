<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('layout');
})->name('Book Store');


//Account
//Login
Route::GET('/login', [AccountController::class, 'login'])->name('auth.login');
Route::POST('/login', [AccountController::class, 'customLogin'])->name('auth.custom.login');
//Register
Route::GET('/register', [AccountController::class, 'register'])->name('auth.register');
Route::POST('/register', [AccountController::class, 'customRegister'])->name('auth.custom.register');
//Log out
Route::GET('logout', [AccountController::class, 'logout'])->name('auth.logout');

### ADMIN ###
Route::prefix('/')->middleware('IsAdmin')->group(function () {
    Route::GET('/admin', [AdminController::class, 'index'])->name('admin.index');
    ### USER ###
    Route::GET('/user', [UserController::class, 'index'])->name('user.index');
    Route::GET('/create-user', [UserController::class, 'create'])->name('user.create');
    Route::POST('/store-user', [UserController::class,'store'])->name('user.store');
    Route::GET('/edit-user/{user_id}', [UserController::class, 'edit'])->name('user.edit');
    Route::POST('/update-user/{user_id}', [UserController::class, 'update'])->name('user.update');
    Route::POST('/delete-user/{user_id}', [UserController::class, 'destroy'])->name('user.destroy');
});