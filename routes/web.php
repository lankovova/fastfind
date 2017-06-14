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

// Authorization routes
Auth::routes();

// Home route
Route::get('/', 'HomeController@index')->name('home');

// List route
Route::get('/list', 'ListController@index')->name('list');
Route::post('/list', 'ListController@filter')->name('filterList');

// Leave review route
Route::post('/api/leaveReview', 'ReviewController@index')->name('leaveReview');

// Search route
Route::get('/api/search', 'SearchController@index')->name('search');

// Place route
Route::get('/place/{id}', 'PlaceController@index')->name('place');

// User profile routes
Route::get('/profile', 'UserController@showSelf')->name('selfprofile');
Route::get('/profile/edit', 'UserController@edit')->name('editprofile');
Route::get('/user/{id}', 'UserController@show')->name('userprofile');



