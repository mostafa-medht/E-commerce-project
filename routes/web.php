<?php

Route::get('/', function () {
    return view('index');
});

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
