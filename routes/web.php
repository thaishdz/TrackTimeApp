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
    return view('layouts.master');
});

/*Route::get('/test', function () {
    return view('test');
});
*/
Route::get('profile',function() {
	return view('TracktimeApp.profile');
});

// CRUD - Project ///////////////////////////////////////

Route::resource('projects','ProjectController');

/////////////////////////////////////////////////////////

// CRUD - Task
Route::resource('tasks','TaskController');
/////////////////////////////////////////////////////////

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/verify/{token}','VerifyController@verify')->name('verify');
