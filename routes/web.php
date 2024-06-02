<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;


// Route::get('/', function () {
//     return view('register');
// });

// Route::post('/register', [HomeController::class, 'register'])->name('register');
// Route::post('/login', [HomeController::class, 'login'])->name('login');
// Route::get('/account', [HomeController::class, 'account']);
// Route::post('/logout', [HomeController::class, 'logout'])->name('logout');


Route::get('/', [LoginController::class, 'index'])->name('index');
Route::post('/login', [LoginController::class, 'validateUser'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/content', [LoginController::class, 'checkLogin']);
Route::post('/register', [LoginController::class, 'register'])->name('register');