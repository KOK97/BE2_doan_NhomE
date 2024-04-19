<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
Route::get('/', function () {
    return view('welcome');
});

### ADMIN ###
Route::prefix('/admin')->group(function () {
    Route::GET('/', function () {
        return view('admin.index');
    })->name('admin.index');
    ### USER ###
    Route::GET('/user', [UserController::class, 'index'])->name('user.index');
    Route::GET('/create-user', [UserController::class, 'create'])->name('user.create');
    Route::POST('/store-user', [UserController::class,'store'])->name('user.store');
    Route::GET('/edit-user/{user_id}', [UserController::class, 'edit'])->name('user.edit');
    Route::POST('/update-user/{user_id}', [UserController::class, 'update'])->name('user.update');
    Route::POST('/delete-user/{user_id}', [UserController::class, 'destroy'])->name('user.destroy');
});