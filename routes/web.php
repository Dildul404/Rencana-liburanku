<?php

use App\Http\Controllers\DestinationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'register']);

Route::get('/register', [UserController::class, 'showRegister']);

Route::post('/register', [UserController::class, 'store']);

Route::get('/login', [UserController::class, 'showLogin']);
    
Route::post('/login', [UserController::class, 'auth']);

Route::get('/home', [HomeController::class, 'index']);

Route::get('/logout', [UserController::class, 'logout']);

Route::get('/destinasi_liburan', [DestinationController::class, 'showDestination']);

Route::post('/destination', [DestinationController::class, 'store']);

Route::get('/rencana_liburan', function () {
    return view('rencana_liburan');
});