<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function show_rev(){
        $reviews = Review::all();
        return view('backend.admin.reviews',["reviews" => $reviews]);
    }

    public function add_rev(){
        return view('backend.admin.add_review');
    }
    public function insert_rev(){
        $validation = request()->validate([
            "name" => "required",
            "job" => "required",
            "headline" => "required",
            "review" => "required",
            "authorpic" => "required",
        ],[
            "name.required" => "Please fill the author name.",
            "job.required" => "Please fill the author job.",
            "headline.required" => "Please fill the headline.",
            "review.required" => "Please fill the review.",
            "authorpic.required" => "Please fill the author picture.",
        ]);
        if($validation){
            $review = new Review();
            $review->name = $validation['name'];
            $review->job = $validation['job'];
            $review->headline = $validation['headline'];
            $review->review = $validation['review'];

            $authorpic = $validation['authorpic'];
            $authorpic_name = uniqid() . "_" . $authorpic->getClientOriginalName();
            $authorpic->move(public_path('images/reviews'), $authorpic_name);
            $review->author_pic = $authorpic_name;
            $review->save();
            return redirect()->route('backend.add_review')->with("success","New Review is added successfully");
        }else{
            return back()->with('fail',"New Review can not be added");
        }
    }
    public function edit_rev(Review $review){
        return view('backend.admin.edit_reviews',["review" => $review]);
    }

    public function chg_rev(Review $review, Request $request){
        $review->name = $request->name;
        $review->job = $request->job;
        $review->headline = $request->headline;
        $review->review = $request->review;

        if($request->authorpic){
            if(file_exists(public_path('images\reviews\\').$review->author_pic)){
                unlink(public_path('images/reviews/').$review->author_pic);
            }
            $review_pic = $request->authorpic;
            $review_picname =  uniqid() . "_" . $review_pic->getClientOriginalName();
            $review_pic->move(public_path('images/reviews'),$review_picname);
            $review->author_pic = $review_picname;
        }
        $review->update();
        return redirect()->route('backend.review')->with("success","Review has been updated successfully");
    }

    public function del_rev($id){
        $review = Review::findOrFail($id);
        if(file_exists(public_path('images\reviews\\').$review->author_pic)){
            unlink(public_path('images/reviews/').$review->author_pic);
            $review->delete();
        }
        return view('backend.admin.reviews')->with('delete','Review has been deleted successfully');
    }
}
