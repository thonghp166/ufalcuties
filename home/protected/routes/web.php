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
	$note = 'Dang nhap';
    return view('welcome', ['noteA' => $note]);
});

Route::group(['namespace'=>'Admin'],function(){
	Route::group(['prefix'=>'login','middleware'=> 'CheckLogedIn'],function(){
		Route::get('/','LoginController@getLogin');
		Route::post('/','LoginController@postLogin');
	});

	Route::get('logout','HomeController@getLogout');
	Route::group(['prefix'=> 'admin','middleware'=>'CheckLogedOut'],function(){
			Route::get('home','HomeController@getHome');
	});
});