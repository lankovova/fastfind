<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class ListController extends Controller
{
    public function index(Request $request)
    {
        $chosenCategory = $request->input('c', 'all');

        $category = Category::where('name', $chosenCategory)->first();
        $places = $category->places->where('published', true);

        return view('list', ['places' => $places]);
    }
}
