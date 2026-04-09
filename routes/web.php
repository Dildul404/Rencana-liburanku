<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('register');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/destinasi_liburan', function () {
    return view('destinasi_liburan');
});

Route::get('/rencana_liburan', function () {
    return view('rencana_liburan');
});
