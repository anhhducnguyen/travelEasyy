<?php

use App\Http\Controllers\Admin\AgencyController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\HomeAdminController;
use App\Http\Controllers\Admin\TourController;
use App\Http\Controllers\Admin\TourGuideController;
use App\Http\Controllers\Admin\VehicleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\listingsController;

// FE ROUTE

Route::get('/', [LoginController::class, 'index'])->name('index');
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/account', [UserController::class, 'account'])->name('account');
Route::get('/logout_up', [UserController::class, 'logout_up'])->name('logout_up');
Route::get('/listings', [listingsController::class, 'listings'])->name('listings');

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
    



//=====ADMIN==================
Route::get('admin/tours/create', [TourController::class, 'create'])->name('admin.tours.create');

// Route cho việc lưu tour mới
Route::post('admin/tours', [TourController::class, 'store'])->name('admin.tours.store');

// Route cho việc hiển thị danh sách tour
Route::get('admin/dasboard', [HomeAdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('admin/tours/view', [TourController::class, 'index'])->name('admin.tours.view');
// Route::get('/listings/tour_detail/{idTour}', [TourDetailController::class, 'tour_detail'])->name('tour_detail');

// CUSTOMER CREATE
Route::get('admin/customer/create', [TourController::class, 'create'])->name('admin.customer.create');
Route::get('admin/customer/create', [CustomerController::class, 'store'])->name('admin.customer.create');


// Route cho admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('vehicles', VehicleController::class);
    Route::resource('tourguides', TourGuideController::class);
    Route::resource('agencies', AgencyController::class);
    Route::resource('customer', CustomerController::class);
});