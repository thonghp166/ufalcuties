<?php

Route::get('/',[
	'as' => 'home',
	'uses' => 'HomeController@index'
]);
Route::get('/home','HomeController@index');
Route::get('/staff','StaffController@index');

Route::get('/search',[
	'as' => 'search',
	'uses' => 'HomeController@search'
]);
Route::get('/staff/{id}',[
	'as' => 'staff.info',
	'uses' => 'StaffController@show'
]);
Route::get('/staff/{id}/edit',[
	'middleware' => 'auth',
	'as' =>'staff.edit',
	'uses' => 'StaffController@edit']);
Route::post('/staff/{id}/edit',[
	'middleware' => 'auth',
	'as' => 'staff.update.info',
	'uses' => 'StaffController@updateInfo'
]);

Route::get('/staff/{id}/field',[
	'middleware' => 'auth',
	'as' =>'staff.edit.field',
	'uses' => 'StaffController@edit_field'
]);

Route::post('/staff/{id}/field',[
	'middleware' => 'auth',
	'as' =>'staff.update.field',
	'uses' => 'StaffController@updateField'
]);

Route::get('/staff/{id}/topic',[
	'middleware' => 'auth',
	'as' =>'staff.edit.topic',
	'uses' => 'StaffController@edit_topic']);
Route::post('/staff/{id}/topic',[
	'middleware' => 'auth',
	'as' => 'staff.update.topic',
	'uses' => 'TopicController@update'
]);
//get('/department/new','DepartmentController@create');
//post('department','DepartmentController@store');

Route::get('/field','FieldController@index');

Auth::routes();
Route::get('password/change',[
	'middleware' => 'auth',
	'as' => 'password.change',
	'uses' => 'Auth\ChangePasswordController@showChangePasswordForm'
]);
Route::post('password/change', [
	'middleware' => 'auth',
	'as' => 'password.change',
	'uses' => 'Auth\ChangePasswordController@change'
]);

Route::group(['middleware' => 'CheckAdminLogin', 'prefix' => 'admin'], function() {
	Route::get('/', 'AdminController@index')->name('admin.home');

	Route::post('/','DepartmentController@store')->name('admin.add.department');
	Route::get('/delete','DepartmentController@delete')->name('admin.delete.department');
	Route::delete('/delete','DepartmentController@delete')->name('admin.delete.department');
	Route::post('/','DepartmentController@update')->name('admin.update.department');


	Route::post('/','FieldController@addField')->name('admin.add.field');
	Route::post('/','FieldController@deleteField')->name('admin.delete.field');
	Route::post('/','FieldController@updateField')->name('admin.update.field');


	Route::post('/','UserController@add')->name('admin.add.user');
	Route::post('/','UserController@deleteUser')->name('admin.delete.user');
	Route::post('/','UserController@updateUser')->name('admin.update.user');
});


Route::get('/test',[
	'as' => 'test',
	'uses' => 'HomeController@test'
]);
