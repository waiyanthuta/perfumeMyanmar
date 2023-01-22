<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show_product(){
        $products = Product::with('product_detail')->get();
        return view('backend.admin.products',["products" => $products]);
    }

    public function add_product(){
        $categories = Category::all();
        return view('backend.admin.add_products',["categories" => $categories]);
    }

    public function insert_product(){
        $validation = request()->validate([
            "name" => "required",
            "category_id" => "required",
            "detail" => "required",
            "desc" => "required",
            "productpic" => "required",
        ],[
            "name.required" => "You must fill the Product Name",
            "category_id.required" => "You must fill the Product Category",
            "detail.required" => "You must fill the Product Detail",
            "desc.required" => "You must fill the Product Description",
            "productpic.required" => "You must fill the Product Picture",
        ]);
        if($validation){
            $product = new Product();
            $product->name = $validation['name'];
            $product->desc = $validation['desc'];
            $product->category_id = $validation['category_id'];
            
            $productpic = $validation['productpic'];
            $productpic_name = uniqid(). "_" . $productpic->getClientOriginalName();
            $productpic->move(public_path('images/products/'),$productpic_name);

            $product->product_pic = $productpic_name;
            $product->save();
            if($product){
                foreach($validation['detail'] as $detail){
                    $pdt_detail = new ProductDetail();
                    $pdt_detail->product_id = $product->id;
                    $pdt_detail->size = $detail['size'];
                    $pdt_detail->price = $detail['price'];
                    $pdt_detail->save();
                }
            }
            return redirect()->route('backend.product')->with("success","Product has been added successfully");
        }else{
            return back()->with("fail","Product can not be added");
        }
    }
    public function view_product(Product $product){
        return view('backend.admin.view_product',["product" => $product]);
    }
    public function edit_product(Product $product){
        $categories = Category::with('product')->get();
        return view('backend.admin.edit_product',["product" => $product, "categories" => $categories]);
    }
    public function chg_product(Product $product,Request $request){
        // dd($request->all());
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->desc = $request->desc;
        if($request->productpic){
            if(file_exists(public_path('images\products\\').$product->product_pic)){
                unlink(public_path('images/products/').$product->product_pic);
            }
            $product_pic = $request->productpic;
            $product_picname =  uniqid() . "_" . $product_pic->getClientOriginalName();
            $product_pic->move(public_path('images/products'),$product_picname);
            $product->product_pic = $product_picname;
        }
        $product->update();
        if($request->detail){
            foreach($product->product_detail as $detail){
                $detail->delete();
            }
            foreach($request->detail as $detail){
                $p_detail = new ProductDetail();
                $p_detail->product_id = $product->id;
                $p_detail->size = $detail['size'];
                $p_detail->price = $detail['price'];
                $p_detail->save();
            }
        }
        return redirect()->route('backend.product')->with("success","Product Updated Successfully");
    }

    public function del_product($id){
        $product = Product::findOrFail($id);
            if(file_exists(public_path('images/products/').$product->product_pic)){
                unlink(public_path('images/products/').$product->product_pic);
            }
            $product->delete();
            return redirect()->route("backend.product")->with("success","Product has been deleted Successfully");
    }
}
