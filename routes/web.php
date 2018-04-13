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
    return view('mainTracktime');
});

Route::get('/profile/settings',function() {
	return view('TracktimeApp.profile');
});

Route::get('projects',function(){
	return view('TracktimeApp.projects');
});

Route::get('tasks',function(){
	return view('TracktimeApp.tasks');
});

/*Route::get('/test',function() {
	return view('mainTracktime');
});*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/verify/{token}','VerifyController@verify')->name('verify');
