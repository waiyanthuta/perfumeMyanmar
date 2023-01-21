<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Perfume;
use App\Models\PerfumeDetail;
use App\Models\PerfumeSize;
use Illuminate\Http\Request;

class PerfumeController extends Controller
{
    // backend 
    public function show_Perf(){
        // $perfumes = Perfume::all();
        // $perfumeDetails = PerfumeDetail::with('perfume')->get();
        $perfumes = Perfume::with('perfume_detail')->get();
        // dd($perfumeDetails);
        return view('backend.admin.perf',["perfumes" => $perfumes]);
    }

    public function add_Perf(){
        $sizes = PerfumeSize::all();
        // dd($sizes);
        return view('backend.admin.add_perfume',[
            "sizes" => $sizes,
        ]);
    }

    public function insert_Perf(){
        $validation = request()->validate([
            "name" => "required",
            "category" => "required",
            "detail" => "required",
            // "price" => "required",
            "desc" => "required",
            "perfumepic" => "required",
        ],[
            "name.required" => "You must fill the name.",
            "category.required" => "You must choose the category.",
            "detail.required" => "You must choose the size.",
            // "price.required" => "You must fill the price.",
            "desc.required" => "You must fill the description.",
            "perfumepic.required" => "Please Choose Picture.",
        ]);
        if($validation){
            // dd($validation);
            $perfume = new Perfume();
            $perfume->name = $validation['name'];
            $perfume->desc = $validation['desc'];
            $perfume->category = $validation['category'];

            $perfumepic = $validation['perfumepic'];
            $perfumepic_name = uniqid() . "_" . $perfumepic->getClientOriginalName();
            $perfumepic->move(public_path('images/perfumes'), $perfumepic_name);
            $perfume->perfume_pic = $perfumepic_name;
            $perfume->save();

            foreach($validation['detail'] as $detail){
                $perf_detail = new PerfumeDetail();
                $perf_detail->perfume_id = $perfume->id;
                $perf_detail->perfume_size_id = $detail['size'];
                $perf_detail->price = $detail['price'];
                $perf_detail->save();
            }
            return redirect()->route('backend.perfume')->with('success','New Perfume has been added successfully');
        }else {
            return back()->with('fail','Something is wrong');
        }
        }

        public function view_Perf(Perfume $perfume){
            return view('backend.admin.view_perfume',["perfume" => $perfume]);
        }
    
        public function edit_Perf(Perfume $perfume){
                $sizes = PerfumeSize::all();
                return view('backend.admin.edit_perfume',["perfume" => $perfume, "sizes" => $sizes]);
        }

        public function chg_Perf(Request $request,Perfume $perfume){
            $perfume->name = $request->name;
            $perfume->category = $request->category;
            $perfume->desc = $request->desc;
            if($request->perfumepic){
                if(file_exists(public_path('images\perfumes\\').$perfume->perfume_pic)){
                    unlink(public_path('images/perfumes/').$perfume->perfume_pic);
                }
                $perfume_pic = $request->perfumepic;
                $perfume_picname =  uniqid() . "_" . $perfume_pic->getClientOriginalName();
                $perfume_pic->move(public_path('images/perfumes'),$perfume_picname);
                $perfume->perfume_pic = $perfume_picname;
                $perfume->update();
            }
            if($request->detail){
                foreach($request->detail as $detail){
                    $perf_detail = new PerfumeDetail();
                    $perf_detail->perfume_id = $perfume->id;
                    $perf_detail->perfume_size_id = $detail['size'];
                    $perf_detail->price = $detail['price'];
                    $perf_detail->save();
                }
            }
                return redirect()->route('backend.perfume')->with("success","Perfume has been Updated successfully");
        }

        public function del_Perf($id){
            $perfume = Perfume::findOrFail($id);
            if(file_exists(public_path('images/perfumes/').$perfume->perfume_pic)){
                unlink(public_path('images/perfumes/').$perfume->perfume_pic);
            }
            $perfume->delete();
            return redirect()->route("backend.perfume")->with("success","Perfume has been deleted Successfully");
        }

        public function del_PerfDetail(Request $request){
                $id = $request->id;
                $detail = PerfumeDetail::findOrFail($id);
                $detail->delete();
                return response()->json([
                    'status' => 200
                ]);
        }
}
