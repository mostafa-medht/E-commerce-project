<?php

Route::get('/',[
    'uses' => 'FrontEndController@index',
    'as' => 'index'
]);

Route::get('/pdt/{slug}',[
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

Route::get('/cart/rapid/add/{id}',[
    'uses' => 'ShoppingController@rapid_add',
    'as' => 'cart.rapid.add'
]);

Route::get('/cart/cheackout',[
    'uses' => 'CheckoutController@index',
    'as' => 'cart.checkout'
]);

Route::post('/cart/cheackout',[
    'uses' => 'CheckoutController@pay',
    'as' => 'cart.checkout'
]);

// Route::get('/results',function(){
//     $products = \App\Product::where('name','like', '%' . request('query') . '%')->get();

//     return view('results')->with('products',$products)
//                             ->with('name','Search results : ' . request('query'))
//                             ->with('query',request('query'));
// });
//Route::resource('products','ProductsController');

// Route::get('products/deleted/{id}',[
//     'uses' => 'ProductsController@destroy',
//     'as' => 'products.deleted'
// ]);

// Route::get('products/trashed',[
//     'uses' => 'ProductsController@trashed',
//     'as' => 'products.trashed'
// ]);

Auth::routes();

Route::get('/logout','Auth\LoginController@logout');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/results/{query}',[
    'uses' => 'SearchController@search',
    'as' => 'results'
]);


Route::group(['prefix' => 'admin','middleware'=>'auth'],function(){
    Route::get('/',[
        'uses' => 'AdminController@index',
        'as' => 'admin.index'
    ]);

    
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
        'as' => 'products.update'
    ]);


    ////***** User ********* */

    Route::get('/users',[
        'uses' => 'UsersController@index',
        'as' => 'users'
    ]);

    Route::get('/user/create',[
        'uses' => 'UsersController@create',
        'as' => 'user.create'
    ]);

    Route::post('/user/store',[
        'uses' => 'UsersController@store',
        'as' => 'user.store'
    ]);

    Route::get('/user/admin/{id}',[
        'uses' => 'UsersController@admin',
        'as' => 'user.admin'
    ])->middleware('admin');

    Route::get('/user/not_admin/{id}',[
        'uses' => 'UsersController@not_admin',
        'as' => 'user.not.admin'
    ]);

    Route::get('/user/profile',[
        'uses' => 'profilesController@index',
        'as' => 'user.profile'
    ]);

    Route::get('/user/delete/{id}',[
        'uses' => 'UsersController@destroy',
        'as' => 'user.delete'
    ]);

    Route::post('/user/profile/update',[
        'uses' => 'profilesController@update',
        'as' => 'user.profile.update'
    ]);
});
