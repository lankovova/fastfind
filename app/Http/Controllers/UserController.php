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
            return 'my profile';
        }
        else {
            return 'you don`t have an account. please login';
        }
        // return view('home');
    }

    public function show($id)
    {
        return 'it`s user ' . $id . ' profile';
        // return view('home');
    }
}
