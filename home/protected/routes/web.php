<?php

Route::get('/',[
	'as' => 'home',
	'uses' => 'HomeController@index'
]);
Route::get('/home','HomeController@index');
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
	'middleware' => 'auth',
	'as' =>'staff.edit',
	'uses' => 'StaffController@edit']);
Route::post('/staff/{id}/edit',[
	'middleware' => 'auth',
	'as' => 'staff.updateinfo',
	'uses' => 'StaffController@updateInfo'
]);

Route::get('/staff/{id}/field',[
	'middleware' => 'auth',
	'as' =>'staff.edit_field',
	'uses' => 'StaffController@edit_field'
]);

Route::post('/staff/{id}/field',[
	'middleware' => 'auth',
	'as' =>'staff.update.field',
	'uses' => 'StaffController@updateField'
]);

Route::get('/staff/{id}/topic',[
	'middleware' => 'auth',
	'as' =>'staff.edit_topic',
	'uses' => 'StaffController@edit_topic']);
Route::post('/staff/{id}/topic',[
	'middleware' => 'auth',
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
	Route::post('/','AdminController@addDepartment')->name('admin.add.department');
	Route::post('/','AdminController@addField')->name('admin.add.field');
	Route::post('/','AdminController@addUser')->name('admin.add.user');
});
