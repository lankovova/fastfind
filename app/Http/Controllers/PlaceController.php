<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException as ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use App\Place;
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
            // Return 404 page
            return 'There isn\'t such place';
        }
    }

    public function showEditor() {
        $categories = Category::all();

        return view('placeeditor', ['categories' => $categories]);
    }

    public function createPlace(Request $request) {
        if (!Auth::check())
            return redirect()->route('login');

        $categories = Category::all();

        $input = $request->all();

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
            $place->published = (Auth::user()->type == "admin") ? 1 : 0;

            $place->save();

            self::uploadPlaceImage();

        } catch (Exception $e) {
            $response = ['status' => 'error', 'text' => 'Something went wrong. Please check your input data'];
            // TODO: If error pass place data to template
            return view('placeeditor', ['categories' => $categories, 'response' => $response]);
        }

        $response = ['status' => 'done', 'text' => 'Place successfully created!'];

        return view('placeeditor', ['categories' => $categories, 'response' => $response]);
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
                // echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                // echo "File is not an image.";
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
