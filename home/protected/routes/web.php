<?php

Route::get('/','HomeController@index');

Route::get('/staff','StaffController@index');
Route::get('/staff/{id}',[
	'as' => 'staff.info',
	'uses' => 'StaffController@show'
]);
// Route::get('/staff/create','StaffController@create');

// post('/staff/new', 
// [
// 	'as' => 'staff.new',
// 	'uses' => 'StaffController@store'
// ]);
Route::get('/staff/{id}/edit',[
	'as' =>'staff.edit',
	'uses' => 'StaffController@edit']);
Route::post('/staff/{id}/edit',[
	'as' => 'staff.updateinfo',
	'uses' => 'StaffController@updateInfo'
]);

Route::get('/staff/{id}/field',[
	'as' =>'staff.edit_field',
	'uses' => 'StaffController@edit_field']);

Route::get('/staff/{id}/topic',[
	'as' =>'staff.edit_topic',
	'uses' => 'StaffController@edit_topic']);
Route::post('/staff/{id}/topic',[
	'as' => 'staff.addtopic',
	'uses' => 'TopicController@addTopic'
]);



Route::get('/topic', 'TopicController@create');

Route::get('/department','DepartmentController@index');
//get('/department/new','DepartmentController@create');
//post('department','DepartmentController@store');

Route::get('/field','FieldController@index');

Auth::routes();
Route::get('password/change',[
	'as' => 'password.change',
	'uses' => 'Auth\ChangePasswordController@showChangePasswordForm'
]);
Route::post('password/change', [
	'as' => 'password.change',
	'uses' => 'Auth\ChangePasswordController@change'
]);
Route::get('/', 'HomeController@index')->name('home');
