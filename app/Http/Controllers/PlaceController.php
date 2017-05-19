<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;
use Illuminate\Database\Eloquent\ModelNotFoundException as ModelNotFoundException;

class PlaceController extends Controller
{
    public function index($id)
    {
        try {
            $place = Place::findOrFail($id);
            $placeTags = $place->placeTags;
            $placeReviews = $place->reviews()->orderBy('date', 'desc')->get();

            return view('place', ['place' => $place, 'placeTags' => $placeTags, 'placeReviews' => $placeReviews]);
        } catch (ModelNotFoundException $e) {
            // Return 404 page
            return 'There isn\'t such place';
        }
    }
}