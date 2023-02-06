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
use App\Http\Controllers\Frontend\ProductController as FrontendProductController;
use App\Http\Controllers\ReviewController;

//front end routes

Route::name('frontend.')->group(function(){

    Route::get('/', [IndexController::class , 'index'])->name('home');
    Route::get('/about-us', [AboutController::class , 'about'])->name('about');
    Route::get('/shops', [FrontendShopController::class, 'shops'])->name('shops');
    Route::get('/perfumes', [FrontendPerfumeController::class,'perfumes'])->name('perfumes');
    Route::get('/perfume_detail/{perfume}', [FrontendPerfumeController::class,'perfume_detail'])->name('perfume_detail');
    Route::get('/products', [FrontendProductController::class,'products'])->name('products');
    Route::get('/product_detail', [FrontendProductController::class,'product_detail'])->name('product_detail');

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
        Route::get('/admin/perfumes',[PerfumeController::class,'show_Perf'])->name('perfume');
        Route::get('/admin/add_perfumes',[PerfumeController::class,'add_Perf'])->name('add_perfume');
        Route::post('/admin/add_perfumes',[PerfumeController::class,'insert_Perf'])->name('insert_perfume');
        Route::get('/admin/view_perfumes/{perfume}',[PerfumeController::class,'view_Perf'])->name('view_perfume');
        Route::get('/admin/edit_perfumes/{perfume}',[PerfumeController::class,'edit_Perf'])->name('edit_perfume');
        Route::post('/admin/edit_perfumes/{perfume}',[PerfumeController::class,'chg_Perf'])->name('chg_perfume');
        Route::post('/admin/del_perfumes/{id}',[PerfumeController::class,'del_Perf'])->name('del_perfume');
        Route::post('/admin/del_perfume_detail',[PerfumeController::class,'del_PerfDetail'])->name('del_pefdetail');
        
        //yanant products
        Route::get('/admin/products',[ProductController::class,'show_product'])->name('product');
        Route::get('/admin/add_products',[ProductController::class,'add_product'])->name('add_product');
        Route::post('/admin/add_products',[ProductController::class,'insert_product'])->name('insert_product');
        Route::get('/admin/view_products/{product}',[ProductController::class,'view_product'])->name('view_product');
        Route::get('/admin/edit_products/{product}',[ProductController::class,'edit_product'])->name('edit_product');
        Route::post('/admin/edit_products/{product}',[ProductController::class,'chg_product'])->name('chg_product');
        Route::post('/admin/del_products/{id}',[ProductController::class,'del_product'])->name('del_product');

        //yanant products category
        Route::get('admin/product_categories',[ProductController::class,'show_category'])->name('product_category');
        Route::get('admin/edit_product_categories',[ProductController::class,'edit_category'])->name('edit_product_category');
        Route::post('admin/edit_product_categories',[ProductController::class,'chg_category'])->name('chg_product_category');
        Route::post('admin/add_product_categories',[ProductController::class,'insert_category'])->name('insert_product_category');
        Route::post('admin/del_product_categories/{id}',[ProductController::class,'del_category'])->name('del_product_category');
        
        //yanant shops
        Route::get('/admin/shops',[ShopController::class,'show_shop'])->name('shop');
        Route::get('/admin/add_shops',[ShopController::class,'add_shop'])->name('add_shop');
        Route::post('/admin/add_shops',[ShopController::class,'insert_shop'])->name('insert_shop');
        Route::get('/admin/edit_shops',[ShopController::class,'edit_shop'])->name('edit_shop');
        Route::post('/admin/edit_shops',[ShopController::class,'chg_shop'])->name('chg_shop');
        Route::post('/admin/del_shops/{id}',[ShopController::class,'del_shop'])->name('del_shop');

        //control tab

        Route::get('/admin/reviews',[ReviewController::class,'show_rev'])->name('review');
        Route::get('/admin/add_reviews',[ReviewController::class,'add_rev'])->name('add_review');
        Route::post('/admin/insert_reviews',[ReviewController::class,'insert_rev'])->name('insert_review');
        Route::get('/admin/edit_reviews/{review}',[ReviewController::class,'edit_rev'])->name('edit_review');
        Route::post('/admin/edit_reviews/{review}',[ReviewController::class,'chg_rev'])->name('chg_review');
        Route::post('/admin/del_reviews',[ReviewController::class,'del_rev'])->name('del_review');

    });
});

  