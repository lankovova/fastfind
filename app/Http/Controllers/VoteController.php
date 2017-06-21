<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;
use App\Vote;
use App\Category;
use Auth;

class VoteController extends Controller
{
	public function index(Request $req) {
		if (!Auth::check())
			abort(404);

		$data = $req->all();
		$categories = Category::all();

		$categoryId = -1;
		if (isset($data['category']) && $data['category'] != 'all') {
			foreach ($categories as $category) {
				if ($data['category'] == $category->name)
					$categoryId = $category->id;
			}

			$greenlightPlaces = Place::where('invoting', true)->where('category_id', $categoryId)->get();
		} else {
			$greenlightPlaces = Place::where('invoting', true)->get();
		}

		return view('simplelist', ['places' => $greenlightPlaces, 'categories' => $categories, 'chosenCat' => $categoryId]);
	}

	public function vote(Request $req) {
		if (!Auth::check())
			abort(404);

		$data = $req->all();

		$vote = new Vote;
		$vote->user_id = Auth::user()->id;
		$vote->place_id = $data['placeId'];
		$vote->save();

		$totalVotes = count(Place::where('id', $data['placeId'])->first()->votes);

		if ($totalVotes >= 100) {
			DB::table('places')
				->where('id', $data['placeId'])
				->update(['published' => 1])
				->update(['invoting' => 0]);
		}

		return redirect()->route('votePage');
	}
}
