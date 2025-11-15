<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/about', function () {
    return view('about');
});


Route::get('/contact', function () {
    return view('contact');
});


Route::get('/courses', function () {
    return view('courses');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('login.post');