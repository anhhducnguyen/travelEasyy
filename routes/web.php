<?php

use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\HomeAdminController;
use App\Http\Controllers\Admin\HotelController;
use App\Http\Controllers\Admin\TourController;
use App\Http\Controllers\Admin\TourGuideController;
use App\Http\Controllers\Admin\VehicleController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Middleware\CheckAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GoogleController;

// FE ROUTE

Route::get('/', [LoginController::class, 'index'])->name('index');
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::get('/loginn', [UserController::class, 'login'])->name('loginn');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/account', [UserController::class, 'account'])->name('account');
Route::get('/logout_up', [UserController::class, 'logout_up'])->name('logout_up');


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
Route::get('/login', [AdminLoginController::class, 'show_login'])->name('login');
Route::post('/check_login', [AdminLoginController::class, 'check_login']);


Route::get('/admin', [HomeAdminController::class, 'index'])
    ->middleware(CheckAdmin::class)
    ->name('admin.index');

// Các route khác dành cho admin

Route::middleware(['auth', CheckAdmin::class])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [HomeAdminController::class, 'dashboard'])->name('dashboard');
        Route::resource('vehicles', VehicleController::class);
        Route::resource('tourguides', TourGuideController::class);
        Route::resource('users', App\Http\Controllers\Admin\UserController::class);
        Route::resource('hotels', HotelController::class);
        Route::resource('tours', TourController::class);
        Route::resource('bookings', BookingController::class);
        Route::post('bookings/{booking}/confirm', [BookingController::class, 'confirm'])->name('bookings.confirm');
        Route::post('bookings/{booking}/pay', [BookingController::class, 'pay'])->name('bookings.pay');
    });
});



Route::namespace('App\Http\Controllers\User')->group(function () {
    Route::get('/tours', 'UserTourController@index')->name('tours.index');
    Route::post('/tours/book', 'UserTourController@book')->name('tours.book');
});
