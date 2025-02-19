<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/login', function () {
    return view('user.login');
})->name('user.login');

Route::get('/register', function () {
    return view('user.register');
})->name('user.register');
