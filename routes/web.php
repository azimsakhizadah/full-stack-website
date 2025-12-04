<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\FaqController;
use App\Http\Controllers\Backend\FeaturesContoller;
use App\Http\Controllers\Backend\FeaturesController;
use App\Http\Controllers\Backend\IntrosController;
use App\Http\Controllers\Backend\ReviewController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\TitleContoller as BackendTitleContoller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\TitleContoller;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\TeamController;
use App\Http\Controllers\HomeController;
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

require __DIR__ . '/auth.php';


route::post('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');

route::get('/verify', [AdminController::class, 'showVerification'])->name('custom.verification.form');
route::post('/verify', [AdminController::class, 'verificationVerify'])->name('custom.verification.verify');


Route::middleware('auth')->group(function () {
    // sldier Controller
    Route::controller(SliderController::class)->group(function () {
        route::get('/get/slider', 'GetSlider')->name('get.slider');
        route::post('/update/slider/{id}', 'UpdateSlider')->name('update.slider');
        route::post('/edit-slider/{id}', 'EditSlider');
    });

    // update the titile in browser
    Route::controller(TitleContoller::class)->group(function () {
        route::post('/edit-features/{id}', 'EditFeatures');
        route::post('/edit-answers/{id}', 'EditAnswers');
        route::post('/edit-reviews/{id}', 'EditReviews');
    });


    // Our services controller
    Route::controller(FeaturesController::class)->group(function () {
        Route::get('/all/features', 'AllFeature')->name('all.features');
        route::get('/add/feature', 'AddFeatureForm')->name('add.feature.form');
        route::post('/add/feature', 'AddFeature')->name('add.feature');
         route::get('/edit/feature/{id}', 'EditFeature')->name('edit.feature');
        route::post('/update/feature/{id}', 'UpdateFeature')->name('update.feature');
        route::get('/delete/feature/{id}', 'DeleteFeature')->name('delete.feature');
    });

    // home page introduction controller
    Route::controller(IntrosController::class)->group(function () {
        Route::get('/all/introvalue', 'AllIntrovalue')->name('all.introvalue');
        Route::get('/get/intro', 'GetIntro')->name('get.intro');
        Route::post('/update/intro/{id}', 'UpdateIntro')->name('update.intro');
        Route::post('/add/introvalue', 'addIntrovalue')->name('add.introvalue');
        Route::get('/add/introvalue', 'addIntrovalueForm')->name('add.introvalue.form');
        Route::get('/delete/introvalue/{id}', 'deleteIntrovalue')->name('delete.introvalue');
    });

    // our Home controller
     Route::controller(HomeController::class)->group(function () {
        // portfolio controller
        Route::get('/get/usability', 'GetUsability')->name('get.usability');
        Route::post('/get/usability/{id}', 'UpdateUsability')->name('update.usability');
        // cta controller
         Route::get('/get/cta', 'GetCta')->name('get.cta');
        Route::post('/get/cta/{id}', 'UpdateCta')->name('update.cta');
    });

    // review controller
    Route::controller(ReviewController::class)->group(function () {
        route::get('/all/review', 'AllReview')->name('all.review');
        route::get('/add/review', 'AddReviewForm')->name('add.review.form');
        route::post('/add/review', 'AddReview')->name('add.review');
        route::get('/edit/review/{id}', 'EditReview')->name('edit.review');
        route::post('/update/review/{id}', 'UpdateReview')->name('update.review');
        route::get('/delete/review/{id}', 'DeleteReview')->name('delete.review');
    });

    // FAQ controller 
    Route::controller(FaqController::class)->group(function(){
        route::get('/all/faq', 'AllFaq')->name('all.faq');
        route::get('/add/faq', 'AddFaqForm')->name('add.faq.form');
        route::post('/add/faq', 'AddFaq')->name('add.faq');
        route::get('/edit/faq/{id}', 'EditFaq')->name('edit.faq');
        route::post('/update/faq/{id}', 'UpdateFaq')->name('update.faq');
        route::get('/delete/faq/{id}', 'DeleteFaq')->name('delete.faq');
    });

     Route::controller(TeamController::class)->group(function () {
        Route::get('/all/team', 'AllTeam')->name('all.team');
        route::get('/add/team', 'AddTeamForm')->name('add.team.form');
        route::post('/add/team', 'AddTeam')->name('add.team');
         route::get('/edit/team/{id}', 'EditTeam')->name('edit.team');
        route::post('/update/team/{id}', 'UpdateTeam')->name('update.team');
        route::get('/delete/team/{id}', 'DeleteTeam')->name('delete.team');
    });


});

// frontend controllers
// about page
route::get('/about', [HomeController::class, 'AboutPage'])->name('about');

// team member
route::get('/team', [TeamController::class, 'TeamPage'])->name('team');

