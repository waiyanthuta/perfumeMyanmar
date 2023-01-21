<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\PerfumeController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ShopController;
use App\Http\Controllers\Frontend\PerfumeController as FrontendPerfumeController;
use App\Http\Controllers\Frontend\ShopController as FrontendShopController;


//front end routes

Route::name('frontend.')->group(function(){

    Route::get('/', [IndexController::class , 'index'])->name('home');
    Route::get('/about-us', [AboutController::class , 'index'])->name('about');
    // Route::get('/contact-us', function () {
    //     return view('frontend.contact-us');
    // })->name('contact');
    Route::get('/shops', [FrontendShopController::class, 'index'])->name('shops');
    Route::get('/perfumes', [FrontendPerfumeController::class,'index'])->name('perfumes');
    Route::get('/products', function () {
        return view('frontend.products');
    })->name('products');

});

//admin route
// Route::get('/yanant/admin/login',[PageController::class,'loginform'])->name('backend.loginform');
// Route::post('/yanant/admin/login',[PageController::class,'login'])->name('backend.login');

Route::name('backend.')->group(function(){
    Route::middleware(['guest:admin'])->prefix('yanant')->group(function(){
        Route::get('/admin',[PageController::class,'loginform'])->name('loginform');
        Route::post('/admin',[PageController::class,'login'])->name('login');
    });

    Route::middleware(['auth:admin'])->prefix('yanant')->group(function(){
        Route::get('/admin/home',[PageController::class,'index'])->name('index');
        Route::get('/admin/logout',[PageController::class,'logout'])->name('logout');

        //yanant unique perfumes
        Route::get('/admin/perfume',[PerfumeController::class,'show_Perf'])->name('perfume');
        Route::get('/admin/add_perfume',[PerfumeController::class,'add_Perf'])->name('add_perfume');
        Route::post('/admin/add_perfume',[PerfumeController::class,'insert_Perf'])->name('insert_perfume');
        Route::get('/admin/view_perfume/{perfume}',[PerfumeController::class,'view_Perf'])->name('view_perfume');
        Route::get('/admin/edit_perfume/{perfume}',[PerfumeController::class,'edit_Perf'])->name('edit_perfume');
        Route::post('/admin/edit_perfume/{perfume}',[PerfumeController::class,'chg_Perf'])->name('chg_perfume');
        Route::post('/admin/del_perfume/{id}',[PerfumeController::class,'del_Perf'])->name('del_perfume');
        Route::post('/admin/del_perfume_detail',[PerfumeController::class,'del_PerfDetail'])->name('del_pefdetail');
        
        //yanant products
        Route::get('/admin/products',[ProductController::class,'show_product'])->name('product');
        Route::get('/admin/add_products',[ProductController::class,'add_product'])->name('add_product');
        Route::post('/admin/add_products',[ProductController::class,'insert_product'])->name('insert_product');
        Route::get('/admin/edit_products',[ProductController::class,'edit_product'])->name('edit_product');
        Route::post('/admin/edit_products',[ProductController::class,'chg_product'])->name('chg_product');
        Route::get('/admin/del_products',[ProductController::class,'del_product'])->name('del_product');
        
        //yanant shops
        Route::get('/admin/shops',[ShopController::class,'show_shop'])->name('shop');
        Route::get('/admin/add_shops',[ShopController::class,'add_shop'])->name('add_shop');
        Route::post('/admin/add_shops',[ShopController::class,'insert_shop'])->name('insert_shop');
        Route::get('/admin/edit_shops',[ShopController::class,'edit_shop'])->name('edit_shop');
        Route::post('/admin/edit_shops',[ShopController::class,'chg_shop'])->name('chg_shop');
        Route::post('/admin/del_shops/{id}',[ShopController::class,'del_shop'])->name('del_shop');

    });
});

  