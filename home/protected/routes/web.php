<?php
use Illuminate\Support\Facades\Input;

Route::get('/',[
	'as' => 'home',
	'uses' => 'HomeController@index'
]);
Route::get('/home','HomeController@index');

Route::get('/search',[
	'as' => 'search',
	'uses' => 'HomeController@search'
]);
Route::get('/staff/info/{account}',[
	'as' => 'staff.info',
	'uses' => 'StaffController@show'
]);

Route::group(['middleware' => 'auth', 'prefix' => 'staff'], function() {
	Route::get('/edit/info','StaffController@edit')->name('staff.edit');
	Route::post('/edit/info','StaffController@updateInfo')->name('staff.update.info');

	Route::get('/edit/field','StaffController@edit_field')->name('staff.edit.field');
	Route::post('/edit/field','StaffController@updateField')->name('staff.update.field');
	
	Route::get('/edit/topic','StaffController@edit_topic')->name('staff.edit.topic');

	Route::get('/add/topic','TopicController@add')->name('staff.add.topic');
	Route::get('/delete/topic','TopicController@destroy')->name('staff.delete.topic');
	Route::get('/update/topic','TopicController@update')->name('staff.update.topic');

});

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

	Route::post('/import','UserController@importExcel')->name('admin.add.user.excel');
});


Route::get('/test',[
	'as' => 'test',
	'uses' => 'HomeController@test'
]);

Route::post('/test',[
	'as' => 'import',
	'uses' => 'UserController@importExcel'
]);

