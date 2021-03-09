<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function reviews()
    {
        $reviews = Review::orderByDesc('created_at')->paginate(5);    
        return view('main.reviews', compact('reviews'));
    }
    public function saveReview(Request $request)
    {
        $validated = $request->validate([
            'nameReviews' => 'required|min:3|max:55',            
            'review'      => 'required|min:3|max:1000',
        ]);
        $review = new Review();
        $review->name = $request->nameReviews;
        $review->review = $request->review;
        if($_POST['product_id']){
            $review->product_id = $request->product_id;
            $review->save();
        }
        $review->save();

        //  dd( $request->all() );
        return back()->with('success', 'Спасибо за отзыв!');
    }
}
