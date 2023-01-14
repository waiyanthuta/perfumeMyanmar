<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Backend\PageController;


//front end routes

Route::name('frontend.')->group(function(){

    Route::get('/', [IndexController::class , 'index'])->name('home');
    Route::get('/about-us', [AboutController::class , 'index'])->name('about');
    // Route::get('/contact-us', function () {
    //     return view('frontend.contact-us');
    // })->name('contact');
    Route::get('/shops', function () {
        return view('frontend.shops');
    })->name('shops');
    Route::get('/perfumes', function () {
        return view('frontend.perfumes');
    })->name('perfumes');
    Route::get('/products', function () {
        return view('frontend.products');
    })->name('products');

});

//admin route
Route::prefix('yanant')->name('backend.')->group(function(){
    Route::middleware(['guest:admin'])->group(function(){
        Route::get('/backend/admin',[PageController::class,'loginform'])->name('loginform');
        Route::post('/backend/admin',[PageController::class,'login'])->name('login');
    });

    Route::middleware(['auth:admin'])->group(function(){

    });
});

