<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\ReviewController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.index');
})->name('home');

Route::get('/dashboard', function () {
    return view('admin/index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


route::post('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');

route::get('/verify', [AdminController::class, 'showVerification'])->name('custom.verification.form');
route::post('/verify', [AdminController::class, 'verificationVerify'])->name('custom.verification.verify');


Route::middleware('auth')->group(function () {
    Route::controller(ReviewController::class)->group(function(){
        route::get('/all/review', 'AllReview')->name('all.review');
        route::get('/add/review', 'AddReviewForm')->name('add.review.form');
        route::post('/add/review', 'AddReview')->name('add.review');
        route::get('/edit/review/{id}', 'EditReview')->name('edit.review');
        route::post('/update/review/{id}', 'UpdateReview')->name('update.review');
        route::get('/delete/review/{id}', 'DeleteReview')->name('delete.review');
    });

    Route::controller(SliderController::class)->group(function(){
        route::get('/get/slider', 'GetSlider')->name('get.slider');
        route::post('/update/slider/{id}', 'UpdateSlider')->name('update.slider');
        route::post('/edit-slider/{id}', 'EditSlider');
    });

});

