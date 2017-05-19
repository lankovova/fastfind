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

    public function filter(Request $request)
    {
        $data = $request->all();

        if ($request->input('c')) {
            $chosenCategory = $request->input('c', 'all');
            $category = Category::where('name', $chosenCategory)->first();
            $places = $category->places;
        } else {
            $places = Place::all();
        }

        $places = $places->where('published', true);

        if ($data['rating'])
            $places = $places->where('rating', $data['rating']);
        if ($data['price'])
            $places = $places->where('average_price', $data['price']);

        return view('list', ['places' => $places, 'filters' => $data]);
    }
}
