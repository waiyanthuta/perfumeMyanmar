<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Perfume;
use App\Models\PerfumeDetail;
use Illuminate\Http\Request;

class PerfumeController extends Controller
{
    public function index() {
        $inspireperfumes = Perfume::with('perfume_detail')->where('category','inspire')->get();
        $uniqueperfumes = Perfume::with('perfume_detail')->where('category','unique')->get();
        return view('frontend.perfumes',[
            "inspireperfumes" => $inspireperfumes,
            "uniqueperfumes" => $uniqueperfumes
        ]);
    }
}
