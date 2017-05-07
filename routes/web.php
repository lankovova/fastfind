<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Category;

Route::get('/', function () {

	// $category = new Category;
	// $category->name = 'drink';
	// $category->save();

	$categories = Category::all();

	foreach ($categories as $cat)
		echo $cat->name . " ";

	return view('home', ['categories' => $categories]);
});

Route::get('/list', function () {
	return view('list');
});

Route::get('/place/{name}', function ($name) {
	return view('place', ['name' => $name]);
});


Route::get('/auth', function () {
	return view('auth');
});

Route::get('/about', function () {
	return view('about');
});
