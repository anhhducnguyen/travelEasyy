<?php

use App\Http\Controllers\Api\ApiTourController;
use App\Http\Controllers\Api\ApiUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


// Route::group(['prefix' => 'api'], function () {
    // Route::post('/tours', [ApiTourController::class, 'store']);
    // Route::get('/tours/{id}', [ApiTourController::class, 'show']);
    // Route::put('/tours/{id}', [ApiTourController::class, 'update']);
    // Route::delete('/tours/{id}', [ApiTourController::class, 'destroy']);
// });


//Register
Route::post('register',[ApiUserController::class,'register']);

//Login
Route::post('login',[ApiUserController::class,'login']);

//Profile
Route::group([
    "middleware" => ["auth:sanctum"]
],function(){
    Route::get('profile',[ApiUserController::class,'profile']);

    Route::get('logout',[ApiUserController::class,'logout']);
});

//Tours
Route::apiResource('/tours', ApiTourController::class);

