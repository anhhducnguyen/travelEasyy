<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\HomeAdminController;
use App\Http\Controllers\Admin\HotelController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\TourController;
use App\Http\Controllers\Admin\TourGuideController;
use App\Http\Controllers\Admin\VehicleController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\UserTourController;
use App\Http\Middleware\CheckAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GoogleController;

// FE ROUTE
// REGISTER__LOGIN__LOGOUT
Route::get('/', [AccountController::class, 'index'])->name('index');
Route::get('/register', [AccountController::class, 'register'])->name('register');
Route::get('/user-login', [AccountController::class, 'login'])->name('loginn');
Route::get('/logout', [AccountController::class, 'logout'])->name('logout');
Route::get('/account', [AccountController::class, 'account'])->name('account');
Route::get('/logout_up', [AccountController::class, 'logout_up'])->name('logout_up');

// PROFILE AND UPDATE PROFILE
Route::get('/account', [ProfileController::class, 'account'])->name('account');
Route::post('/account/update', [ProfileController::class, 'updateProfile'])->name('updateProfile');

// EMAIL
Route::get('/verify_account/{email}', [AccountController::class, 'verify'])->name('account.verify');

// STORE REGISTER__LOGIN__LOGOUT
Route::post('/store', [AccountController::class, 'store'])->name('store');
Route::post('/storeLogin', [AccountController::class, 'storeLogin'])->name('storeLogin');

// SSO
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('auth.google.callback');

// CHANGE PASSWORD
Route::get('/change-password', [PasswordResetController::class, 'showChangePasswordForm'])->name('password.change');
Route::post('/change-password', [PasswordResetController::class, 'changePassword'])->name('password.update');

// FORGOT PASSWORD
Route::get('/forgot-password', [PasswordResetController::class, 'forgot_password'])->name('account.forgot-password');
Route::post('/forgot-password', [PasswordResetController::class, 'check_forgot_password'])->name('account.check-forgot-password');

// RESET PASSWORD
Route::get('/reset_password/{token}', [PasswordResetController::class, 'reset_password'])->name('account.reset_password');
Route::post('/reset_password/{token}', [PasswordResetController::class, 'check_reset_password'])->name('check_reset_password');
    
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


// FE ROUTE
Route::get('/tours', [UserTourController::class, 'index'])->name('tours.index');
Route::get('/tours/{id}', [UserTourController::class, 'show'])->name('tours.show');





