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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
	Route::get('review/create', 'Admin\ReviewController@add')->middleware('auth');
	Route::post('review/create', 'Admin\ReviewController@create');
	Route::get('review', 'Admin\ReviewController@index');
	Route::get('review/edit', 'Admin\ReviewController@edit');
	Route::post('review/edit', 'Admin\ReviewController@update');
	Route::get('review/delete', 'Admin\ReviewController@delete');
	Route::get('profile/create', 'Admin\ProfileController@add')->middleware('auth');
	Route::post('profile/create', 'Admin\ProfileController@create');
	Route::get('profile/edit', 'Admin\ProfileController@edit')->middleware('auth');
	Route::post('profile/edit', 'Admin\ProfileController@update');
	Route::get('profile', 'Admin\ProfileController@index');
	Route::get('profile/delete', 'Admin\ProfileController@delete');
});

	Route::get('/', 'ReviewController@index');
	
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
