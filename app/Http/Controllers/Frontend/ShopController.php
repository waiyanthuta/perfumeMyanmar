<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function shops() {
        $shops = Shop::all();
        return view('frontend.shops',["shops" => $shops]);
    }
}
