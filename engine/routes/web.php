<?php

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::resource('customers', 'CustomersController');
    Route::get('customers/search-cities/{id}', 'CustomersController@searchCities');

    Route::resource('products', 'ProductsController');
    Route::resource('stocks', 'StocksController');

    Route::resource('sales', 'SalesController');
    Route::get('sales/search/{id}', 'SalesController@search');
    Route::get('sales/search-customer/{id}', 'SalesController@searchCustomer');
    Route::post('sales/cost', 'SalesController@cost');

    Route::resource('sales-toko', 'SalesTokoController');
    Route::get('sales-toko/search/{id}', 'Sales-tokoController@search');
    Route::get('sales-toko/search-customer/{id}', 'Sales-tokoController@searchCustomer');
    Route::post('sales-toko/cost', 'Sales-tokoController@cost');
    
    Route::resource('users', 'UsersController');
    Route::post('users/change-password/{id}', 'UsersController@changePassword');
});
