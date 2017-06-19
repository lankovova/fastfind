<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use DB;

class UserController extends Controller
{
    public function showSelf()
    {
        if (Auth::check()) {
            // Get this user reviews
            $reviews = User::findOrFail(Auth::user()->id)->reviews()->orderBy('date', 'desc')->get();
            // Get user instance with Auth facade and pass it to view
            $user = Auth::user();
            return view('profile', ['user' => $user, 'reviews' => $reviews]);
        }
        else {
            return redirect()->route('login');
        }
    }

    public function showEdit()
    {
        if (Auth::check()) {
            // Get user instance with Auth facade and pass it to view
            $user = Auth::user();
            return view('editProfile', ['user' => $user]);
        }
        else {
            return redirect()->route('login');
        }
    }

    public function edit(Request $req) {
        $data = $req->all();

        // Apply changes to database
        if (empty($data['userPicture'])) {
            DB::table('users')
                ->where('id', Auth::user()->id)
                ->update([
                        'name' => $data['name'],
                        'address' => $data['address'],
                        'phone' => $data['phone'],
                        'facebook' => $data['facebook'],
                        'twitter' => $data['twitter'],
                        'googleplus' => $data['googleplus'],
                        'vk' => $data['vk']
                        // TODO: changable email
                        ]);
        } else {
            DB::table('users')
                ->where('id', Auth::user()->id)
                ->update([
                        'name' => $data['name'],
                        'address' => $data['address'],
                        'phone' => $data['phone'],
                        'facebook' => $data['facebook'],
                        'twitter' => $data['twitter'],
                        'googleplus' => $data['googleplus'],
                        'vk' => $data['vk'],
                        'photo' => basename($_FILES["userPicture"]["name"])
                        // TODO: changable email
                        ]);

            self::uploadPlaceImage();
        }

        return redirect()->back();
    }

    public function show($id)
    {
        try {
            // Get this user reviews
            $reviews = User::findOrFail($id)->reviews()->orderBy('date', 'desc')->get();
            // Get user by id from database
            $user = User::findOrFail($id);
            // Pass user instance to the view
            return view('profile', ['user' => $user, 'reviews' => $reviews]);
        } catch (ModelNotFoundException $e) {
            // Return 404 page
            return 'There isn\'t such place';
        }
    }

    public function ban(Request $request)
    {
        $input = $request->all();

        DB::table('users')
            ->where('id', $input['userId'])
            ->update(['type' => 'banned']);

        return redirect()->back();
    }

    public function unban(Request $request)
    {
        $input = $request->all();

        DB::table('users')
            ->where('id', $input['userId'])
            ->update(['type' => 'user']);

        return redirect()->back();
    }

    private function uploadPlaceImage() {
        $target_dir = "images/users/";
        $target_file = $target_dir . basename($_FILES["userPicture"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["userPicture"]["tmp_name"]);
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
            if (move_uploaded_file($_FILES["userPicture"]["tmp_name"], $target_file)) {
                // echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            } else {
                // echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}
