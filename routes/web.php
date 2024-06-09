<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GoogleController;

// ===FE ROUTE===========================================================================

Route::get('/', [LoginController::class, 'index'])->name('index');
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/account', [UserController::class, 'account'])->name('account');
Route::get('/logout_up', [UserController::class, 'logout_up'])->name('logout_up');

// REGISTER__LOGIN__LOGOUT
Route::post('/store', [UserController::class, 'store'])->name('store');
Route::post('/storeLogin', [UserController::class, 'storeLogin'])->name('storeLogin');

//SSO
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('auth.google.callback');





