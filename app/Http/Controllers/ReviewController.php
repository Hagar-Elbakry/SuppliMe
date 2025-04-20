<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        
        $request->validate([
            
            'rating' => ['required','in:1,2,3,4,5']
            
        ]);
        
        $review =Review::updateOrCreate(
            [
                'product_id' => $request->product_id,
                'user_id' => Auth::id(),
            ],
            [
                'rate' => $request->rating,
            ]
        );
        return redirect()->back()->with('rating',$review->rate);
        
    }
}
