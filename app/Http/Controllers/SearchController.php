<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;

class SearchController extends Controller
{
	public function index(Request $request)
	{
		$searchText = $request->input('searchText');

		// Get places that matches searchText in any position
		$places = Place::where("published", 1)
						->where("name", "like", "%$searchText%")
						->orderBy("name", "desc")
						->take(5)
						->get();

		if (count($places) == 0) return;

		for ($i = 0; $i < count($places); $i++) {
			$matchablePlaces[$i]['id'] = $places[$i]['id'];
			$matchablePlaces[$i]['name'] = $places[$i]['name'];
		}

		return json_encode($matchablePlaces);
	}
}
