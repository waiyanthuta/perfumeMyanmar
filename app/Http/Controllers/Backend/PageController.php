<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Perfume;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function loginform(){
        return view('backend.admin.login');
    }

    public function login(){
        $validation=request()->validate([
            'email'=>'required|email|exists:admins,email',
            'password'=>'required|min:6',
        ],
        [
            'email.required'=>'You need to enter the email',
            'password.required'=>'You need to enter the password',
            'password.min'=>'Password should not be less than 6 words',
            'email.exists'=>'This email does not exist on admin list'
        ]);
       if ( Auth::guard('admin')->attempt($validation)){
        //if ( Auth::attempt(['email' => $validation['email'], 'password' => $validation['password']])){
        // dd('success');
           return redirect()->route('backend.index');
       }else {
            return back()->with('fails', 'Incorrect Credentials');
        }
    }

    public function index(){
        $perfumes= Perfume::all();
        $humidifiers= Product::where('category_id','2')->get();
        $diffusers= Product::where('category_id','1')->get();
        $essentialOils= Product::where('category_id','3')->get();
        return view('backend.admin.index',["perfumes"=>$perfumes,"humidifiers"=>$humidifiers,"diffusers"=>$diffusers,"essentialOils"=>$essentialOils]);
    }
    public function logout(){
        auth()->logout();
        return redirect()->route('backend.loginform');
    }
}
