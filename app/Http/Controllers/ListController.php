<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Place;

class ListController extends Controller
{
    public function index(Request $request)
    {
        if ($request->input('c')) {
            $chosenCategory = $request->input('c', 'all');
            $category = Category::where('name', $chosenCategory)->first();
            $places = $category->places->where('published', true);
        } else {
            $places = Place::all()->where('published', true);
        }

        return view('list', ['places' => $places]);
    }
}
