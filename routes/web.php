<?php

Route::get('/',[
    'uses' => 'FrontEndController@index',
    'as' => 'index'
]);

Route::get('/product/{slug}',[
    'uses' => 'FrontEndController@singleProduct',
    'as' => 'product.single'
]);

Route::post('/cart/add',[
    'uses' => 'ShoppingController@add_to_cart',
    'as' => 'cart.add'
]);

Route::get('/cart',[
    'uses' => 'ShoppingController@cart',
    'as' => 'cart'
]);

Route::get('/cart/delete/{id}',[
    'uses' => 'ShoppingController@delete',
    'as' => 'cart.delete'
]);

Route::get('/cart/incr/{id}/{qty}',[
    'uses' => 'ShoppingController@incr',
    'as' => 'cart.incr'
]);

Route::get('/cart/decr/{id}/{qty}',[
    'uses' => 'ShoppingController@decr',
    'as' => 'cart.decr'
]);
//Route::resource('products','ProductsController');
Route::get('/product/create' ,[
    'uses' => 'ProductsController@create',
    'as' => 'products.create'
]);

Route::POST('/product/store' ,[
    'uses' => 'ProductsController@store',
    'as' => 'products.store'
]);

Route::get('/product/delete/{id}' ,[
    'uses' => 'ProductsController@destroy',
    'as' => 'products.destroy'
]);

Route::get('products',[
    'uses' => 'ProductsController@index',
    'as' => 'products.index'
]); 

Route::get('products/trashed',[
    'uses' => 'ProductsController@trashed',
    'as' => 'products.trashed'
]);

Route::get('products/kill/{id}',[
    'uses' => 'ProductsController@kill',
    'as' => 'product.kill'
]);

Route::get('products/restore/{id}',[
    'uses' => 'ProductsController@restore',
    'as' => 'product.restore'
]);

Route::get('products/edit/{id}',[
    'uses' => 'ProductsController@edit',
    'as' => 'products.edit'
]);

Route::post('products/update/{id}',[
    'uses' => 'ProductsController@update',
    'as' => 'product.update'
]);
// Route::get('products/deleted/{id}',[
//     'uses' => 'ProductsController@destroy',
//     'as' => 'products.deleted'
// ]);

// Route::get('products/trashed',[
//     'uses' => 'ProductsController@trashed',
//     'as' => 'products.trashed'
// ]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
