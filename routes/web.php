<?php

Route::get('/', function () {
    return view('welcome');
});

Route::resource('products','ProductsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
