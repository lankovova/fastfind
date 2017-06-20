<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Place;

class ListController extends Controller
{
    public function index(Request $request)
    {
        $chosenCategory;
        if ($request->input('c')) {
            $chosenCategory = $request->input('c', 'all');
            $category = Category::where('name', $chosenCategory)->first();
            $places = $category->places()->where('published', true)->orderBy('name', 'ASC')->get();
        } else {
            $places = Place::where('published', true)->orderBy('name', 'ASC')->get();
        }

        $categories = Category::all();

        return view('list', ['places' => $places, 'categories' => $categories,'chosenCategory' => $chosenCategory]);
    }

    public function filter(Request $request)
    {
        $data = $request->all();

        $chosenCategory;

        if ($data['category'] != 'all') {
            $chosenCategory = $data['category'];
            $category = Category::where('name', $chosenCategory)->first();
            $places = $category->places()->where('published', true)->orderBy('name', 'ASC')->get();
        } else {
            $chosenCategory = 'all';
            $places = Place::where('published', true)->orderBy('name', 'ASC')->get();
        }

        $categories = Category::all();

        $places = $places->where('published', true);

        if ($data['rating'])
            $places = $places->where('rating', $data['rating']);
        if ($data['price'])
            $places = $places->where('average_price', $data['price']);

        return view('list', ['places' => $places, 'filters' => $data, 'categories' => $categories, 'chosenCategory' => $chosenCategory]);
    }
}
