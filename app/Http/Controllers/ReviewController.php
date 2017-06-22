<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\Place;
use DB;

class ReviewController extends Controller
{
    public function create(Request $request)
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

        // Count new rating
        $allReviews = Place::where('id', $placeid)->first()->reviews;
        $newRating = 0;
        foreach ($allReviews as $rev) {
            $newRating += $rev->rating;
        }
        $newRating = round($newRating / count($allReviews));

        DB::table('places')
            ->where('id', $placeid)
            ->update(['rating' => $newRating]);

        return redirect()->route('place', ['id' => $placeid]);
    }

    public function delete(Request $request) {
        $input = $request->all();
        $rid = $input['reviewId'];
        $placeId = $input['placeId'];

        // Delete review
        DB::table('reviews')->where('id', $rid)->delete();

        // Count new rating
        $allReviews = Place::where('id', $placeId)->first()->reviews;
        $newRating = 0;
        foreach ($allReviews as $rev) {
            $newRating += $rev->rating;
        }
        if (count($allReviews == 0)) {
            DB::table('places')
                ->where('id', $placeId)
                ->update(['rating' => 5]);
        } else {
            $newRating = round($newRating / count($allReviews));

            DB::table('places')
                ->where('id', $placeId)
                ->update(['rating' => $newRating]);
        }

        return redirect()->back();
    }
}
