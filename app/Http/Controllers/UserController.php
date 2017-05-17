<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return 'it`s user ' . $id . ' profile';

        // Get user by id from database
        // Pass user instance to the view
        // return view('profile');
    }
}
