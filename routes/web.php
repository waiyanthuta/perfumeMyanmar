<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\AboutController;


//front end routes

Route::name('frontend.')->group(function(){

    Route::get('/', [IndexController::class , 'index'])->name('home');
    Route::get('/about-us', [AboutController::class , 'index'])->name('about');
    Route::get('/contact-us', function () {
        return view('frontend.contact-us');
    })->name('contact');
    Route::get('/shops', function () {
        return view('frontend.shops');
    })->name('shops');
    Route::get('/perfumes', function () {
        return view('frontend.perfumes');
    })->name('perfumes');
Route::get('/service', function () {
    return view('frontend.service');
});

});

