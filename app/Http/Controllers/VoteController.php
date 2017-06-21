<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Place;
Use App\Category;

class VoteController extends Controller
{
    public function index() {
        $greenlightPlaces = Place::where('invoting', true)->get();

        // Return view with list of possible places
        return $greenlightPlaces;
    }
}
