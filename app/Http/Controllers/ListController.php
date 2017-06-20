<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Place;

class ListController extends Controller
{
	public function index(Request $request)
	{
		$input = $request->all();

		// Get filters data
		$filters = [];
		$filters['category'] = isset($input['category']) ? $input['category'] : "";
		$filters['price'] = isset($input['price']) ? $input['price'] : "";
		$filters['rating'] = isset($input['rating']) ? $input['rating'] : "";

		$categories = Category::all();

		// Get chosen category id
		$categoryID;
		foreach ($categories as $category)
			if ($category['name'] == $filters['category'])
				$categoryID = $category['id'];

		if (empty($categoryID)) {
			// If category is set to 'all' then select all places
			$places = Place::where('published', true);
		}
		else {
			// Get places only for chosen category
			$category = Category::where('id', $categoryID)->first();
			$places = $category->places()->where('published', true);
		}

		if (!empty($filters['price']))
			$places = $places->where('average_price', $filters['price']);
		if (!empty($filters['rating']))
			$places = $places->where('rating', $filters['rating']);

		$orderBy = isset($input['orderBy']) ? $input['orderBy'] : "name";
		$orderFlow = isset($input['orderFlow']) ? $input['orderFlow'] : "desc";

		$places = $places->take(12);
		$places = $places->orderBy($orderBy, $orderFlow)->get();

		return view('list', ['places' => $places, 'categories' => $categories, 'filters' => $filters, 'orderBy' => $orderBy, 'orderFlow' => $orderFlow]);
	}

	public function getPlaces(Request $request) {
		$input = $request->all();

		// Get filters data
		$filters = [];
		$filters['category'] = isset($input['category']) ? $input['category'] : "";
		$filters['price'] = isset($input['price']) ? $input['price'] : "";
		$filters['rating'] = isset($input['rating']) ? $input['rating'] : "";

		$categories = Category::all();

		// Get chosen category id
		$categoryID;
		foreach ($categories as $category)
			if ($category['name'] == $filters['category'])
				$categoryID = $category['id'];

		if (empty($categoryID)) {
			// If category is set to 'all' then select all places
			$places = Place::where('published', true);
		}
		else {
			// Get places only for chosen category
			$category = Category::where('id', $categoryID)->first();
			$places = $category->places()->where('published', true);
		}

		if (!empty($filters['price']))
			$places = $places->where('average_price', $filters['price']);
		if (!empty($filters['rating']))
			$places = $places->where('rating', $filters['rating']);

		$orderBy = isset($input['orderBy']) ? $input['orderBy'] : "name";
		$orderFlow = isset($input['orderFlow']) ? $input['orderFlow'] : "desc";

		$placesOnPage = 12;

		$places = $places->skip($placesOnPage * $input['page'])->take($placesOnPage);
		$places = $places->orderBy($orderBy, $orderFlow)->get();


		return $places;
	}

}
