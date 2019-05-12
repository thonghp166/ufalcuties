<?php


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

Route::get('/staff','StaffController@index');

Route::get('/department','DepartmentController@index');

Route::get('/field','FieldController@index');