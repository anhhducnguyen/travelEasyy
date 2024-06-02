<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;



// ===FE ROUTE===========================================================================

Route::get('/', [LoginController::class, 'index'])->name('index');
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/account', [UserController::class, 'account'])->name('account');
Route::get('/logout_up', [UserController::class, 'logout_up'])->name('logout_up');

Route::post('/store', [UserController::class, 'store'])->name('store');
Route::post('/storeLogin', [UserController::class, 'storeLogin'])->name('storeLogin');



