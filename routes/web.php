<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'HomeController@index');
Route::get('/login','UsersController@viewlogin');
Route::post('/login','UsersController@login');
Route::get('/logout','UsersController@logout');
Route::group(['middleware' => 'login'], function(){
	Route::group(['prefix'=>'/users'],function (){
		Route::get('/','UsersController@index');
		Route::post('/created','UsersController@created');
		Route::post('/delete','UsersController@delete');
		Route::post('/test-ajax','UsersController@active');
		Route::post('/update','UsersController@update');
	});
	Route::group(['prefix'=>'/groups'],function(){
		Route::get('/','GroupsController@index');
		Route::post('/created-group','GroupsController@createdGroup');
		Route::post('/delete','GroupsController@delete');
		Route::post('/update-group','GroupsController@update');
	});
	Route::group(['prefix'=>'/rooms'],function(){
		Route::post('/created-room','RoomsController@create');
		Route::post('/delete','RoomsController@delete');
		Route::post('/update-room','RoomsController@update');
	});
	Route::group(['prefix'=>'/home'],function(){
		Route::get('/','HomeController@index');
		Route::post('/view','HomeController@show');
		Route::post('/created','HomeController@created');
		Route::post('/delete','HomeController@delete');
		Route::post('/searchempty','HomeController@searchRoom');
	});
});
