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

// Route::get('/home', function () {

// 	// $category = new Category;
// 	// $category->name = 'drink';
// 	// $category->save();

// 	// $categories = Category::all();
// 	// foreach ($categories as $cat)
// 	// 	echo $cat->name . " ";

// 	return view('homemy');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/list', 'ListController@index')->name('list');

Route::post('/api/leave_review', 'ReviewController@index')->name('leaveReview');

Route::get('/place/{id}', 'PlaceController@index')->name('place');

// User profile routes
Route::get('/profile', 'UserController@showSelf')->name('selfprofile');
Route::get('/user/{id}', 'UserController@show')->name('userprofile');

Route::get('/about', function () {
	return view('about');
})->name('about');



