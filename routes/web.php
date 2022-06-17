<?php

//frontend views
Route::view('/', 'index')->name('home');
Route::view('/seguridad', 'secure')->name('secure');

//Auth
Auth::routes();

//Admin
Route::get('/home', 'HomeController@index')->name('dashboard');

//Files
Route::get('archivos/', 'FilesController@index');
Route::get('archivos/subir', 'FilesController@create')->name('file.create');
Route::post('archivos/subir', 'FilesController@store')->name('file.store');
Route::post('archivos/editar/{id}', 'FilesController@edit');
Route::post('archivos/eliminar/{id}', 'FilesController@destroy');




