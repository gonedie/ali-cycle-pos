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


/** Cart / Trasanction Draft Routes */
Route::get('admin/drafts', 'CartController@index')->name('cart.index');
Route::get('admin/drafts/{draftKey}', 'CartController@show')->name('cart.show');
Route::post('admin/drafts/{draftKey}', 'CartController@store')->name('cart.store');
Route::post('admin/cart/add-draft', 'CartController@add')->name('cart.add');
Route::post('admin/cart/add-draft-item/{draftKey}/{product}', 'CartController@addDraftItem')->name('cart.add-draft-item');
Route::patch('admin/cart/update-draft-item/{draftKey}', 'CartController@updateDraftItem')->name('cart.update-draft-item');
Route::patch('admin/cart/{draftKey}/proccess', 'CartController@proccess')->name('cart.draft-proccess');
Route::delete('admin/cart/remove-draft-item/{draftKey}', 'CartController@removeDraftItem')->name('cart.remove-draft-item');
Route::delete('admin/cart/empty/{draftKey}', 'CartController@empty')->name('cart.empty');
Route::delete('admin/cart/remove', 'CartController@remove')->name('cart.remove');
Route::delete('admin/cart/destroy', 'CartController@destroy')->name('cart.destroy');


/** Transactions Routes */
Route::get('admin/transactions', ['as' => 'transactions.index', 'uses' => 'TransactionsController@index']);
Route::get('admin/transactions/{transaction}', ['as' => 'transactions.show', 'uses' => 'TransactionsController@show']);
Route::get('admin/transactions/{transaction}/pdf', ['as' => 'transactions.pdf', 'uses' => 'TransactionsController@pdf']);
Route::get('admin/transactions/{transaction}/receipt', ['as' => 'transactions.receipt', 'uses' => 'TransactionsController@receipt']);

/** Reports Routes */
  Route::group(['prefix' => 'admin/reports'], function () {
      /** Sales Routes */
      Route::get('sales', ['as' => 'reports.sales.index', 'uses' => 'Reports\SalesController@monthly']);
      Route::get('sales/daily', ['as' => 'reports.sales.daily', 'uses' => 'Reports\SalesController@daily']);
      Route::get('sales/monthly', ['as' => 'reports.sales.monthly', 'uses' => 'Reports\SalesController@monthly']);
      Route::get('sales/yearly', ['as' => 'reports.sales.yearly', 'uses' => 'Reports\SalesController@yearly']);
  });
