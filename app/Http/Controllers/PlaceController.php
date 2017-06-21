<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException as ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use App\Place;
use DB;
use App\Category;

class PlaceController extends Controller
{
	public function index($id) {
		try {
			$place = Place::findOrFail($id);
			$placeTags = $place->placeTags;
			$placeReviews = $place->reviews()->orderBy('date', 'desc')->get();

			return view('place', ['place' => $place, 'placeTags' => $placeTags, 'placeReviews' => $placeReviews]);
		} catch (ModelNotFoundException $e) {
			abort(404);
		}
	}

	public function allPlaces(Request $req) {
		if (!Auth::check() || Auth::user()->type != 'admin')
			abort(404);

		$data = $req->all();
		$categories = Category::all();

		$categoryId = -1;
		if (isset($data['category']) && $data['category'] != 'all') {
			foreach ($categories as $category) {
				if ($data['category'] == $category->name)
					$categoryId = $category->id;
			}

			$places = Place::all()->where('category_id', $categoryId);
		} else {
			$places = Place::all();
		}

		return view('placeslist', ['places' => $places, 'categories' => $categories, 'chosenCat' => $categoryId]);
	}

	public function showEditor() {
		if (Auth::user()->type == 'banned')
			abort(404);
		if (!Auth::check())
			return redirect()->route('login');

		$categories = Category::all();

		return view('placeeditor', ['categories' => $categories]);
	}

	public function showEditorForPlace($id) {
		if (!Auth::check() || Auth::user()->type != "admin")
			abort(404);

		try {
			$place = Place::findOrFail($id);
			$placeTags = $place->placeTags;
			$categories = Category::all();
			return view('placeeditor', ['categories' => $categories, 'place' => $place, 'placeTags' => $placeTags]);
		} catch (ModelNotFoundException $e) {
			abort(404);
		}
	}

	public function editPlace($id, Request $request) {
		if (!Auth::check() || Auth::user()->type != "admin")
			abort(404);

		$categories = Category::all();

		$input = $request->all();

		$published = (!empty($input['published']) && $input['published'] == 'on') ? 1 : 0;

		$categoryId;
		foreach ($categories as $cat) {
			if ($cat->name == $input['category'])
				$categoryId = $cat->id;
		}

		if (empty(basename($_FILES["fileToUpload"]["name"]))) {
			DB::table('places')
				->where('id', $id)
				->update([
						'name' => $input['name'],
						'average_price' => $input['averagePrice'],
						'phone' => $input['phone'],
						'work_hours' => $input['workHours'],
						'address' => $input['address'],
						'website' => $input['website'],
						'description' => $input['description'],
						'published' => $published,
						'category_id' => $categoryId
						]);
		} else {
			DB::table('places')
				->where('id', $id)
				->update([
						'name' => $input['name'],
						'average_price' => $input['averagePrice'],
						'phone' => $input['phone'],
						'work_hours' => $input['workHours'],
						'address' => $input['address'],
						'website' => $input['website'],
						'description' => $input['description'],
						'published' => $published,
						'image' => basename($_FILES["fileToUpload"]["name"]),
						'category_id' => $categoryId
						]);

			self::uploadPlaceImage();
		}

		return redirect()->route('placeeditor', $id);
	}

	public function createPlace(Request $request) {
		if (!Auth::check() || Auth::user()->type == 'banned')
			abort(404);

		$categories = Category::all();

		$input = $request->all();

		$published = (!empty($input['published']) && $input['published'] == 'on') ? 1 : 0;

		$selectedCategory = Category::where('name', $input["category"])->first();

		try {
			$place = new Place;

			$place->category_id = $selectedCategory['id'];
			$place->name = $input["name"];
			$place->average_price = $input["averagePrice"];
			$place->description = $input["description"];
			$place->phone = $input["phone"];
			$place->address = $input["address"];
			$place->work_hours = $input["workHours"];
			$place->image = basename( $_FILES["fileToUpload"]["name"]);
			$place->website = $input["website"];
			$place->published = $published;
			$place->invoting = (Auth::user()->type == "admin") ? 0 : 1;

			$place->save();

			self::uploadPlaceImage();

		} catch (Exception $e) {
			$response = ['status' => 'error', 'text' => 'Something went wrong. Please check your input data'];
			return view('placeeditor', ['categories' => $categories, 'response' => $response]);
		}

		$response = ['status' => 'done', 'text' => 'Place successfully created!'];

		return view('placeeditor', ['categories' => $categories, 'response' => $response]);
	}

	public function delete(Request $req) {
		$placeId = $req->all()['placeId'];

		DB::table('places')->where('id', $placeId)->delete();

		return redirect()->route('list');
	}

	private function uploadPlaceImage() {
		$target_dir = "images/places/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check !== false) {
				$uploadOk = 1;
			} else {
				$uploadOk = 0;
			}
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				// echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			} else {
				// echo "Sorry, there was an error uploading your file.";
			}
		}
	}
}
