<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('admin/dashboard', function () {
    return view('layouts/dashboard');
});

/** TypeMerks Routes */
Route::resource('admin/type-merk', 'TypeController', ['except' => ['create', 'show', 'edit']]);

/** Suppliers Routes */
Route::resource('admin/supplier', 'SupplierController', ['except' => ['create', 'show', 'edit']]);

/** Products Routes */
Route::get('products/price-list', ['as' => 'products.price-list', 'uses' => 'ProductsController@priceList']);
Route::resource('admin/products', 'ProductsController', ['except' => ['create', 'show', 'edit']]);
