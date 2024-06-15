<?php

use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\HomeAdminController;
use App\Http\Controllers\Admin\HotelController;
use App\Http\Controllers\Admin\TourController;
use App\Http\Controllers\Admin\TourGuideController;
use App\Http\Controllers\Admin\VehicleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GoogleController;
use App\Models\CustomerModel;

// FE ROUTE

Route::get('/', [LoginController::class, 'index'])->name('index');
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/account', [UserController::class, 'account'])->name('account');
Route::get('/logout_up', [UserController::class, 'logout_up'])->name('logout_up');

Route::namespace('App\Http\Controllers\User')->group(function () {
    Route::get('/tours', 'tourController@index')->name('tours.index');
    Route::post('/tours/book', 'tourController@book')->name('tours.book');
    // Add other routes as needed
});


// EMAIL
Route::get('/verify_account/{email}', [UserController::class, 'verify'])->name('account.verify');

// REGISTER__LOGIN__LOGOUT
Route::post('/store', [UserController::class, 'store'])->name('store');
Route::post('/storeLogin', [UserController::class, 'storeLogin'])->name('storeLogin');

// SSO
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('auth.google.callback');

// CHANGE PASSWORD
Route::get('/change-password', [UserController::class, 'showChangePasswordForm'])->name('password.change');
Route::post('/change-password', [UserController::class, 'changePassword'])->name('password.update');

// FORGOT PASSWORD
Route::get('/forgot-password', [UserController::class, 'forgot_password'])->name('account.forgot-password');
Route::post('/forgot-password', [UserController::class, 'check_forgot_password'])->name('account.check-forgot-password');

// RESET PASSWORD
Route::get('/reset_password/{token}', [UserController::class, 'reset_password'])->name('account.reset_password');
Route::post('/reset_password/{token}', [UserController::class, 'check_reset_password'])->name('check_reset_password');
    
// UPDATE PROFILE
Route::post('/account/update', [UserController::class, 'updateProfile'])->name('updateProfile');



//=====ADMIN==================

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [HomeAdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('vehicles', VehicleController::class);
    Route::resource('tourguides', TourGuideController::class);
    Route::resource('users',  App\Http\Controllers\Admin\UserController::class);
    Route::resource('hotels', HotelController::class);
    Route::resource('tours', TourController::class);

});





