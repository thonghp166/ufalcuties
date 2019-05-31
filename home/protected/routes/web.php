<?php
// Control to home function
Route::get('/',[
	'as' => 'home',
	'uses' => 'HomeController@index'
]);
Route::get('/home','HomeController@index');
// Search in home
Route::get('/search',[
	'as' => 'search',
	'uses' => 'HomeController@search'
]);
Route::get('/search/{type}/{name}',[
	'as' => 'search.type',
	'uses' => 'HomeController@searchtype'
]);

Route::get('search/field','HomeController@searchByField')->name('staff.search.field');
Route::get('search/department','HomeController@searchByDepartment')->name('staff.search.department');
Route::get('search/text', 'HomeController@searchText')->name('staff.search.text');
// Show staff's info
Route::get('/staff/info/{account}',[
	'as' => 'staff.info',
	'uses' => 'StaffController@show'
]);
// Paths for staff function
Route::group(['middleware' => 'auth', 'prefix' => 'staff'], function() {
	// Edit staff's info
	Route::get('/edit/info','StaffController@edit')->name('staff.edit');
	// Update staff's info which edited
	Route::post('/edit/info','StaffController@updateInfo')->name('staff.update.info');
	//Update avatar
	Route::post('/edit/avatar','StaffController@updateAvatar')->name('staff.update.avatar');
	//Delete avatar
	Route::get('/edit/avatar','StaffController@deleteAvatar')->name('staff.delete.avatar');
	// Edit staff's field 
	Route::get('/edit/field','StaffController@edit_field')->name('staff.edit.field');
	// Update staff's field which edited
	Route::post('/edit/field','StaffController@updateField')->name('staff.update.field');
	// Edit staff's topic 
	Route::get('/edit/topic','StaffController@edit_topic')->name('staff.edit.topic');
	// Add staff's topic 
	Route::get('/add/topic','TopicController@add')->name('staff.add.topic');
	// Delete staff's topic
	Route::get('/delete/topic','TopicController@destroy')->name('staff.delete.topic');
	// Update staff's topic
	Route::get('/update/topic','TopicController@update')->name('staff.update.topic');

});
// Control to field function
Route::get('/field','FieldController@index');
Auth::routes();
// Show form change user's password 
Route::get('password/change',[
	'middleware' => 'auth',
	'as' => 'password.change',
	'uses' => 'Auth\ChangePasswordController@showChangePasswordForm'
]);
// Change user's password
Route::post('password/change', [
	'middleware' => 'auth',
	'as' => 'password.change',
	'uses' => 'Auth\ChangePasswordController@change'
]);
// Paths for admin function
Route::group(['middleware' => 'CheckAdminLogin', 'prefix' => 'admin'], function() {
	// Control admin's home
	Route::get('/', 'AdminController@index')->name('admin.home');
	// Add admin department
	Route::post('/add-department','DepartmentController@add')->name('admin.add.department');
	// Delete admin department
	Route::get('/delete-department','DepartmentController@delete')->name('admin.delete.department');
	// Update admin department
	Route::post('/update-department','DepartmentController@update')->name('admin.update.department');
	// Add admin's field
	Route::post('/add-field','FieldController@add')->name('admin.add.field');
	// Delete field
	Route::get('/delete-field','FieldController@delete')->name('admin.delete.field');
	// Update field by admin
	Route::post('/update-field','FieldController@update')->name('admin.update.field');
	// Admin delete user
	Route::get('/deleteuser','UserController@deleteUser')->name('admin.delete.user');
	// Admin update user
	Route::post('/','UserController@updateUser')->name('admin.update.user');
	// Admin add user from excel table
	Route::post('/import','UserController@importExcel')->name('admin.add.user.excel');
	// Admin add user from data excel
	Route::post('/adduser','UserController@addUser')->name('admin.add.user');
});

// View in home
Route::get('/test',[
	'as' => 'test',
	'uses' => 'HomeController@test'
]);
// Import file Excel into database
Route::post('/test',[
	'as' => 'import',
	'uses' => 'UserController@importExcel'
]);

