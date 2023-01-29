<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Perfume;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $perfumes = Perfume::with('perfume_detail')->latest()->get();
        return view('frontend.index',[
            "perfumes" => $perfumes,
        ]);
    }
}
