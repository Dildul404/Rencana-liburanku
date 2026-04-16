<?php

use App\Http\Controllers\DestinationController;
use App\Http\Controllers\HolidayPlanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'showRegister']);

Route::get('/register', [UserController::class, 'showRegister']);

Route::post('/register', [UserController::class, 'store']);

Route::get('/login', [UserController::class, 'showLogin']);
    
Route::post('/login', [UserController::class, 'auth']);

Route::get('/home', [HomeController::class, 'index']);

Route::get('/logout', [UserController::class, 'logout']);

Route::get('/destinasi_liburan', [DestinationController::class, 'showDestination']);

Route::post('/destination', [DestinationController::class, 'store']);

Route::post('/edit_destination', [DestinationController::class, 'edit']);

Route::post('/delete_destination', [DestinationController::class, 'delete']);

Route::get('/rencana_liburan', [HolidayPlanController::class, 'showHolidayPlan']);

Route::post('/location', [HolidayPlanController::class, 'storeLocation']);

Route::post('/location_checked', [HolidayPlanController::class, 'checkLocation']);

Route::post('/location_unchecked', [HolidayPlanController::class, 'uncheckLocation']);

Route::post('/edit_location', [HolidayPlanController::class, 'editLocation']);

Route::post('/delete_location', [HolidayPlanController::class, 'deleteLocation']);

Route::post('/activities', [HolidayPlanController::class, 'storeActivities']);