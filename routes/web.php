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

// ===FE ROUTE===========================================================================

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



// REGISTER__LOGIN__LOGOUT
Route::post('/store', [UserController::class, 'store'])->name('store');
Route::post('/storeLogin', [UserController::class, 'storeLogin'])->name('storeLogin');

//SSO
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('auth.google.callback');


//=====ADMIN==================

// Route cho việc hiển thị danh sách tour
Route::get('admin', [HomeAdminController::class, 'dashboard'])->name('admin');
Route::get('admin/dasboard', [HomeAdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('admin/tours/view', [TourController::class, 'index'])->name('admin.tours.view');

// Route cho admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('vehicles', VehicleController::class);
    Route::resource('tourguides', TourGuideController::class);
    // Route::resource('agencies', AgencyController::class);
    Route::resource('hotels', HotelController::class);
    Route::resource('tours', TourController::class);
    // Route::resource('customer', CustomerController::class);

});





