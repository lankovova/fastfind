<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;

class SearchController extends Controller
{
	public function index(Request $request)
	{
		$searchText = $request->input('searchText');

		// Get places that matches searchText
		$places = Place::where('published', 1)
					->where('name', 'like', '%'.$searchText.'%')
					->orderBy('name', 'desc')
					->take(10)
					->get();

		if (count($places) == 0) return;

		$i = 0;
		foreach ($places as $place) {
			$matchablePlaces[$i]['id'] = $place['id'];
			$matchablePlaces[$i]['name'] = $place['name'];
			$i++;
		}

		return json_encode($matchablePlaces);
	}
}
