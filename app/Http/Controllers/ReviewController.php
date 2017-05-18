<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        // Get post data
        $placeid = $request->input('placeid');
        $userid = $request->input('userid');
        $rating = $request->input('rating');
        $text = $request->input('leave-review-area');

        $newReview = new Review();
        $newReview->place_id = $placeid;
        $newReview->user_id = $userid;
        $newReview->rating = $rating;
        $newReview->text = $text;
        $newReview->date = date('Y-m-d H:i:s');

        $newReview->save();

        return redirect()->route('place', ['id' => $placeid]);
    }
}
