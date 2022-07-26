<?php

//frontend views
Route::get('/', 'SubscriptionController@index')->name('home');
Route::post('/', 'SubscriptionController@store')->name('subscription.store');
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
Route::get('roles', 'AdminRolesController@index')->name('role.index');
Route::get('roles/agregar', 'AdminRolesController@create')->name('role.create');
Route::patch('roles/agregar', 'AdminRolesController@store')->name('role.store');
Route::get('roles/{id}/editar', 'AdminRolesController@edit')->name('role.edit');
Route::get('roles/{id}', 'AdminRolesController@show')->name('role.show');
Route::patch('roles/{id}/editar', 'AdminRolesController@update')->name('role.update');
Route::patch('roles/{id}/eliminar', 'AdminRolesController@destroy')->name('role.destroy');

//Permissions

Route::get('permisos', 'AdminPermissionsController@index')->name('permission.index');
Route::get('permisos/agregar', 'AdminPermissionsController@create')->name('permission.create');
Route::patch('permisos/agregar', 'AdminPermissionsController@store')->name('permission.store');
Route::get('permisos/{id}/editar', 'AdminPermissionsController@edit')->name('permission.edit');
//Route::get('permisos/{id}', 'AdminPermissionsController@show')->name('permission.show');
Route::patch('permisos/{id}/editar', 'AdminPermissionsController@update')->name('permission.update');
Route::patch('permisos/{id}/eliminar', 'Admin\PermissionsController@destroy')->name('permission.destroy');


//Users

Route::get('usuarios', 'Admin\UsersController@index')->name('user.index');
Route::get('usuarios/agregar', 'Admin\UsersController@create')->name('user.create');
Route::patch('usuarios/agregar', 'Admin\UsersController@store')->name('user.store');
Route::get('usuarios/{id}/editar', 'Admin\UsersController@edit')->name('user.edit');
Route::get('usuarios/{id}', 'Admin\UsersController@show')->name('user.show');
Route::patch('usuarios/{id}/editar', 'Admin\UsersController@update')->name('user.update');
Route::patch('usuarios/{id}/eliminar', 'Admin\UsersController@destroy')->name('user.destroy');

//plans
Route::get('planes', 'SubscriptionController@indexAdmin')->name('plan.index');
Route::get('plan/agregar', 'SubscriptionController@create')->name('plan.create');
Route::patch('plan/agregar', 'SubscriptionController@storeAdmin')->name('plan.store');
Route::get('plan/{id}/editar', 'SubscriptionController@edit')->name('plan.edit');
Route::get('plan/{id}', 'SubscriptionController@show')->name('plan.show');
Route::patch('plan/{id}/editar', 'SubscriptionController@update')->name('plan.update');
Route::patch('plan/{id}/eliminar', 'SubscriptionController@destroy')->name('plan.destroy');


