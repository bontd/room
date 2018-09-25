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
		Route::post('/update','HomeController@update');
	});
	Route::group(['prefix'=>'/index'],function(){
		Route::get('/','IndexController@index');
		Route::get('/detail','IndexController@detail');
		Route::get('/register','IndexController@register');
		Route::post('/created-user','IndexController@created_user');
		Route::get('/profile/{id}','IndexController@profile');
		Route::get('/slideshow','IndexController@slideshow');
	});
	Route::group(['prefix'=>'/location'],function(){
		Route::get('/','LocationController@index');
		Route::post('/created_location','LocationController@created');
		Route::post('/update_location','LocationController@update');
		Route::post('/delete_location','LocationController@delete');
	});
    Route::get('image-upload','ImageController@imageUpload');
    Route::post('image-upload','ImageController@imageUploadPost');
});

Route::get('/', 'IndexController@index')->middleware('cors');
Route::get('/limit', 'IndexController@limit')->middleware('cors');
Route::get('/hotnew', 'IndexController@hotnew')->middleware('cors');
Route::get('/hotcong', 'IndexController@hotcong')->middleware('cors');
Route::get('/testapi', 'IndexController@aixos')->middleware('cors');
Route::get('/product', 'IndexController@product')->middleware('cors');
Route::get('/detail/{id}', 'IndexController@show')->middleware('cors');
Route::get('/productdetail/{id}', 'IndexController@showproduct')->middleware('cors');
Route::get('router/{router}','IndexController@show');
Route::post('router','IndexController@store');
Route::put('router/{router}','IndexController@update');
Route::delete('router/{router}','IndexController@delete');
