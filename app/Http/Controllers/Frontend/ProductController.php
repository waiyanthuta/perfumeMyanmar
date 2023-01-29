<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function products() {
        $diffusers = Product::with('product_detail')->where('category_id','1')->get();
        $humidifiers = Product::with('product_detail')->where('category_id','2')->get();
        $essentialoils = Product::with('product_detail')->where('category_id','3')->get();
        return view('frontend.products',[
            "diffusers" => $diffusers,
            "humidifiers" => $humidifiers,
            "essentialoils" => $essentialoils,
        ]);
    }

    public function product_detail(Request $request){
        // dd($request->all());
        $id = $request->id;
        $product = Product::where('id',$id)->with('product_detail')->first();
        return response()->json($product);
    }
}
