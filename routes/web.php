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
// CRUD - Profile ///////////////////////////////////////
Route::get('profile','UserController@showProfile')->name('profile');
Route::post('profile/update/{id}','UserController@updateProfile');

Route::group(['middleware' => ['auth']], function () {
	Route::resource('projects','ProjectController');
	Route::resource('tasks','TaskController');
    
});
// CRUD - Project ///////////////////////////////////////


/////////////////////////////////////////////////////////

// CRUD - Task
/////////////////////////////////////////////////////////

// CRUD - Time
Route::resource('time','TimeController');
/////////////////////////////////////////////////////////

// CRUD - Admin
Route::resource('admin','AdminController')->middleware('role:admin');
/////////////////////////////////////////////////////////

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/verify/{token}','VerifyController@verify')->name('verify');
