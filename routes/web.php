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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'backend'], function(){
	Route::group(['prefix'=>'category'], function(){
		Route::get('addcat','catController@getAdd');
		Route::get('editcat','catController@getEdit');
		Route::get('listcat','catController@getList');

	});
	Route::group(['prefix'=>'admin'], function(){
		Route::get('addadmin','authController@getAdd');
		Route::post('addadmin', 'authController@postadd');

		Route::get('editadmin/{admin_id}','authController@getEdit');
		Route::get('editadmin/{admin_id}','authController@postEdit');

		Route::get('listadmin','authController@getList');
		Route::get('deleteadmin/{admin_id}','authController@getdelete');

	});
});


Route::group(['prefix'=>'backend'], function(){

	Route::get('/login', function(){
		return view('login');
	});

	Route::get('/welcome', function(){
	return view('user');
	});
});