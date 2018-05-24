<?php

/*========================MAIN PAGE==============================*/
Route::get('/', function () {
    return view('layouts.master');
});
/*================================================================*/

/*==========================PROFILE=============================*/
Route::get('profile','UserController@showProfile')->name('profile');
Route::post('profile/update/{id}','UserController@updateProfile');
/*================================================================*/

/*========================COMPANY CRUD==========================*/

Route::resource('company_details','CompanyController');

/*=============================================================*/

Route::group(['middleware' => ['auth']], function () {
	Route::resource('projects','ProjectController');
	Route::resource('tasks','TaskController');
    
});


/*=========================TIMER CRUD========================*/

Route::resource('time','TimeController');

/*===========================================================*/


/*=========================ADMIN CRUD========================*/

Route::resource('admin','AdminController')->middleware('role:admin');

/*===========================================================*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/verify/{token}','VerifyController@verify')->name('verify');
