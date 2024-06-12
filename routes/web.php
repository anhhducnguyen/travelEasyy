<?php

use App\Http\Controllers\Admin\AgencyController;
use App\Http\Controllers\Admin\HomeAdminController;
use App\Http\Controllers\Admin\TourController;
use App\Http\Controllers\Admin\TourGuideController;
use App\Http\Controllers\Admin\VehicleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\listingsController;
use App\Http\Controllers\tourDetailController;

// ===FE ROUTE===========================================================================

Route::get('/', [LoginController::class, 'index'])->name('index');
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/account', [UserController::class, 'account'])->name('account');
Route::get('/logout_up', [UserController::class, 'logout_up'])->name('logout_up');
Route::get('/listings', [listingsController::class, 'listings'])->name('listings');
// Route::get('/listings/tour_detail/{idTour}', [TourDetailController::class, 'tour_detail'])->name('tour_detail');



// REGISTER__LOGIN__LOGOUT
Route::post('/store', [UserController::class, 'store'])->name('store');
Route::post('/storeLogin', [UserController::class, 'storeLogin'])->name('storeLogin');

//SSO
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('auth.google.callback');


//=====ADMIN==================
Route::get('admin/tours/create', [TourController::class, 'create'])->name('admin.tours.create');

// Route cho việc lưu tour mới
Route::post('admin/tours', [TourController::class, 'store'])->name('admin.tours.store');

// Route cho việc hiển thị danh sách tour
Route::get('admin/dasboard', [HomeAdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('admin/tours/view', [TourController::class, 'index'])->name('admin.tours.view');

// Route cho Vehicles
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('vehicles', VehicleController::class);
    Route::resource('tourguides', TourGuideController::class);
    Route::resource('agencies', AgencyController::class);
});





