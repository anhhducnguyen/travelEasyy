<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\HomeAdminController;
use App\Http\Controllers\Admin\HotelController;
use App\Http\Controllers\Admin\TourController;
use App\Http\Controllers\Admin\TourGuideController;
use App\Http\Controllers\Admin\VehicleController;

use App\Http\Controllers\Api\ApiTourController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\UserTourController;
use App\Http\Middleware\CheckAdmin;
use App\Http\Middleware\CheckLogin;
use App\Http\Middleware\EnsureTokenIsValid;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\User\UserHomeController;

// FE ROUTE
// REGISTER__LOGIN__LOGOUT
Route::get('/register', [AccountController::class, 'register'])->name('register');
Route::get('/login', [AccountController::class, 'login'])->name('login');
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
Route::get('/login-admin', [AdminLoginController::class, 'show_login'])->name('login-admin');
Route::post('/check_login', [AdminLoginController::class, 'check_login']);



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


//Test
// FE ROUTE
Route::get('/', [UserHomeController::class, 'index'])->name('index');
Route::get('/tours', [UserTourController::class, 'index'])->name('tours.index');
Route::get('/tours/{id}', [UserTourController::class, 'show'])->name('tours.show');

Route::middleware(['auth', CheckLogin::class])->group(function () {
    Route::get('/tours/checkout/{tourId}', [CheckoutController::class, 'show'])->name('checkout.show');
    Route::post('/checkout/store-session', [CheckoutController::class, 'storeSession'])->name('checkout.storeSession');
    Route::post('/bookings-confirm', [CheckoutController::class, 'confirmBooking'])->name('bookings.confirm');
});


//RESTful API

    // Route::get('/api/tours', [ApiTourController::class, 'index']);           // Lấy danh sách tất cả các tour
    // Route::post('/api/tours', [ApiTourController::class, 'store']);          // Tạo mới một tour
    // Route::get('/api/tours/{id}', [ApiTourController::class, 'show']);       // Xem chi tiết một tour
    // Route::put('/api/tours/{id}', [ApiTourController::class, 'update']);     // Cập nhật thông tin một tour
    // Route::delete('/api/tours/{id}', [ApiTourController::class, 'destroy']); // Xóa một tour


