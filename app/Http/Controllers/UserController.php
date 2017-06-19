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

    public function edit()
    {
        if (Auth::check()) {
            // Get this user reviews
            $reviews = User::findOrFail(Auth::user()->id)->reviews()->orderBy('date', 'desc')->get();
            // Get user instance with Auth facade and pass it to view
            $user = Auth::user();
            return view('editProfile', ['user' => $user, 'reviews' => $reviews]);
        }
        else {
            return redirect()->route('login');
        }
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
}
