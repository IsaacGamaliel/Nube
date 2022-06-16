<?php

//frontend views
Route::view('/', 'index')->name('home');
Route::view('/seguridad', 'secure')->name('secure');

//Auth
Auth::routes();

//Admin
Route::get('/home', 'HomeController@index')->name('dashboard');

//Files
Route::get('archivos/{type}', 'FilesController@index');
Route::get('archivos/subir', 'FilesController@showFileForm');
Route::post('archivos/subir', 'FilesController@store');
Route::post('archivos/editar/{id}', 'FilesController@edit');
Route::post('archivos/eliminar/{id}', 'FilesController@destroy');




