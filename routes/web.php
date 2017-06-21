<?php
// Authorization routes
Auth::routes();

// Home route
Route::get('/', 'HomeController@index')->name('home');

// List route
Route::get('/list', 'ListController@index')->name('list');
Route::get('/api/getPlaces', 'ListController@getPlaces')->name('getPlaces');

// Vote for places routes
Route::get('/vote', 'VoteController@index')->name('vote');

// Review routes
Route::post('/api/leaveReview', 'ReviewController@create')->name('leaveReview');
Route::post('/api/deleteReview', 'ReviewController@delete')->name('deleteReview');

// Search route
Route::get('/api/search', 'SearchController@index')->name('search');

// Place route
Route::get('/place/{id}', 'PlaceController@index')->name('place');
Route::get('/placeeditor', 'PlaceController@showEditor')->name('placecreator');
Route::post('/placeeditor', 'PlaceController@createPlace')->name('createPlace');
Route::get('/placeeditor/{id}', 'PlaceController@showEditorForPlace')->name('placeeditor');
Route::post('/placeeditor/{id}', 'PlaceController@editPlace')->name('editPlace');
Route::post('/api/deletePlace', 'PlaceController@delete')->name('deletePlace');

// User profile routes
Route::get('/profile', 'UserController@showSelf')->name('selfprofile');
Route::get('/profile/edit', 'UserController@showEdit')->name('showEditPage');
Route::post('/api/editProfile', 'UserController@edit')->name('editprofile');
Route::get('/user/{id}', 'UserController@show')->name('userprofile');

Route::post('/api/banUser', 'UserController@ban')->name('banuser');
Route::post('/api/unbanUser', 'UserController@unban')->name('unbanuser');


