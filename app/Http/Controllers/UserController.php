<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function showSelf()
    {
        if (Auth::check()) {
            // Get user instance with Auth facade and pass it to view
            $user = Auth::user();
            return view('profile', ['user' => $user]);
        }
        else {
            return redirect()->route('login');
        }
    }

    public function show($id)
    {
        try {
            // Get user by id from database
            $user = User::findOrFail($id);
            // Pass user instance to the view
            return view('profile', ['user' => $user]);
        } catch (ModelNotFoundException $e) {
            // Return 404 page
            return 'There isn\'t such place';
        }

    }
}
