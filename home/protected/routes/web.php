<?php

Route::get('/','MainController@getHome');

Route::get('/staff','StaffController@index');
Route::get('/staff/{id}','StaffController@show');

Route::get('/department','DepartmentController@index');
//get('/department/new','DepartmentController@create');
//post('department','DepartmentController@store');

Route::get('/field','FieldController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
