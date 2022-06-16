<?php

//frontend views
Route::view('/', 'index')->name('home');
Route::view('/seguridad', 'secure')->name('secure');

//Auth
Auth::routes();

//Admin
Route::get('/home', 'HomeController@index')->name('dashboard');
