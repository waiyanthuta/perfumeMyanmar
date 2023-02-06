<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ShopController extends Controller
{
    public function show_shop(){
        $shops = Shop::all();
        return view('backend.admin.shops',["shops" => $shops]);
    }
    public function add_shop(){
        return view('backend.admin.add_shop');
    }
    public function insert_shop(){
        $validation = request()->validate([
            "name" => "required",
            "desc" => "required",
            "location" => "required",
            "shoppic" => "required",
        ],[
            "name.required" => "Please fill the shop name.",
            "desc.required" => "Please fill the shop description.",
            "location.required" => "Please fill the shop location.",
            "shoppic.required" => "Please fill the shop picture.",
        ]);
        if($validation){
            $shop = new Shop();
            $shop->name = $validation['name'];
            $shop->desc = $validation['desc'];
            $shop->location = $validation['location'];

            $shoppic = $validation['shoppic'];
            $shoppic_name = uniqid() . "_" . $shoppic->getClientOriginalName();
            $shoppic->move(public_path('images/shops'), $shoppic_name);
            $shop->shop_pic = $shoppic_name;
            $shop->save();
            return redirect()->route('backend.add_shop')->with("success","New Shop is added successfully");
        }else{
            return back()->with('fail',"New Shop can not be added");
        }
    }
    public function edit_shop(Request $request){
        $id = $request->id;
        $shop = Shop::find($id);
        return response()->json($shop);
    }

    public function chg_shop(Request $request){
        // return request()->all();
        $shoppic_name = '';
        $shop = Shop::find($request->shop_id);
        if($request->shoppic){
            $shoppic = $request->shoppic;
            $shoppic_name = uniqid(). "_" .$shoppic->getClientOriginalName();
            $shoppic->move(public_path('images/shops'),$shoppic_name);

            if(file_exists(public_path('images\shops\\').$shop->shop_pic)){
                unlink(public_path('images/shops/').$shop->shop_pic);
                // Storage::delete(public_path('images/shops/').$shop->shop_pic);
            }
        }else{
            $shoppic_name = $request->shop_pic;
        };
        $shopdata = [
            "name" => $request->name,
            "desc" => $request->desc,
            "location" => $request->location,
            "shop_pic" => $shoppic_name,
        ];
        $shop->update($shopdata);
        return response()->json([
            'status' =>200
        ]);
    }
    public function del_shop($id){
        $shop = Shop::findOrFail($id);
        if(file_exists(public_path('images\shops\\').$shop->shop_pic)){
            unlink(public_path('images/shops/').$shop->shop_pic);
            $shop->delete();
        }
        return view('backend.admin.shops')->with('delete','Shop has been deleted successfully');
    }
}
