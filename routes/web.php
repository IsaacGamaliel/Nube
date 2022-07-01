<?php

//frontend views
Route::view('/', 'index')->name('home');
Route::view('/seguridad', 'secure')->name('secure');

//Auth
Auth::routes();

//Admin
Route::get('/home', 'HomeController@index')->name('dashboard');

//Files
Route::get('archivos/subir', 'FilesController@create')->name('file.create');
Route::get('archivos/imagenes', 'FilesController@images')->name('file.images');
Route::get('archivos/videos', 'FilesController@videos')->name('file.videos');
Route::get('archivos/audios', 'FilesController@audios')->name('file.audios');
Route::get('archivos/documentos', 'FilesController@documents')->name('file.documents');
Route::post('archivos/subir', 'FilesController@store')->name('file.store');
// Route::post('archivos/editar/{id}', 'FilesController@edit');
Route::patch('archivos/eliminar/{id}', 'FilesController@destroy')->name('file.destroy');



//Roles
Route::get('roles', 'Admin\RolesController@index')->name('role.index');
Route::get('roles/agregar', 'Admin\RolesController@create')->name('role.create');
Route::patch('roles/agregar', 'Admin\RolesController@store')->name('role.store');
Route::get('roles/{id}/editar', 'Admin\RolesController@edit')->name('role.edit');
Route::get('roles/{id}', 'Admin\RolesController@show')->name('role.show');
Route::patch('roles/{id}/editar', 'Admin\RolesController@update')->name('role.update');
Route::patch('roles/{id}/eliminar', 'Admin\RolesController@destroy')->name('role.destroy');







