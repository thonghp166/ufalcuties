<?php

Route::get('/','MainController@getHome');

Route::get('/staff','StaffController@index');
Route::get('/staff/{id}','StaffController@show');

// post('/staff/new') ->
// {
// 	'as' => 'staff.new',
// 	'action' => 'StaffController@store'
// }

Route::get('/password', function() {
    return view('password');
});

Route::get('/research', function() {
    return view('research');
});

Route::get('/topic', function() {
    return view('topic');
});

Route::get('/department','DepartmentController@index');
//get('/department/new','DepartmentController@create');
//post('department','DepartmentController@store');

Route::get('/field','FieldController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
