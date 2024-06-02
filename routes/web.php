<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


Route::get('/', function () {
    return view('register');
});

Route::post('/register', [HomeController::class, 'register'])->name('register');
Route::post('/login', [HomeController::class, 'login'])->name('login');
// Route::post('/account', [HomeController::class, 'account'])->name('account');
Route::get('/account', [HomeController::class, 'account']);
