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
Auth::routes();
Route::group(['middleware' => 'auth',
	// 'prefix' => ''
	], function () {

   
Route::get('/home', 'HomeController@index')->name('home');

//Customer Routes
Route::get('/customer', 'CustomerController@view')->name('cust');
Route::get('/add_customer', 'CustomerController@index')->name('acust');
Route::post('/create_customer', 'CustomerController@insert')->name('ccust');
Route::get('/view_customer/{id}', 'CustomerController@read')->name('vcust');
Route::get('/edit_customer/{id}', 'CustomerController@edit')->name('ecust');
Route::post('/update_customer/{currentPage}', 'CustomerController@update')->name('ucust');
Route::get('/delete_customer/{id}', 'CustomerController@delete')->name('dcust');
Route::post('/search_customer','CustomerController@search')->name('scust');

//Product Routes
Route::get('/product', 'ProductController@view')->name('prod');
Route::get('/add_product', 'ProductController@index')->name('aprod');
Route::post('/create_product', 'ProductController@insert')->name('cprod');
Route::get('/view_product/{id}', 'ProductController@read')->name('vprod');
Route::get('/edit_product/{id}', 'ProductController@edit')->name('eprod');
Route::post('/update_product', 'ProductController@update')->name('uprod');
Route::get('/delete_product/{id}', 'ProductController@delete')->name('dprod');
Route::get('/search_product','ProductController@search')->name('sprod');


//Order Routes
Route::get('/orders', 'OrderController@index')->name('order');
Route::get('/orders/{id}', 'OrderController@orders')->name('sorder');
Route::get('/add_order', 'OrderController@add')->name('aorder');
Route::post('/create_order', 'OrderController@insert')->name('corder');
Route::get('/edit_order/{id}/{ord_id}', 'OrderController@edit')->name('eorder');
Route::get('/change_status/{id}/{ord_id}/{currentPage}', 'OrderController@changeStatus')->name('eorder');
Route::post('/update_order', 'OrderController@update')->name('uorder');
Route::get('/delete_order/{id}/{ord_id}/{currentPage}', 'OrderController@destroy')->name('dorder');

//Collections Route
Route::get('/collections/pending','CollectionController@pending');
Route::get('/collections/collection','CollectionController@collected');

//PDF Route
Route::get('pdf', 'PDFController@exportpdf');

Route::get('/accounts', 'AccountsController@index');
Route::get('/add_accounts', 'AccountsController@add');
Route::get('/create_accounts', 'AccountsController@create');
Route::get('/accounts/{id}', 'AccountsController@view');
Route::get('/edit_accounts/{id}', 'AccountsController@edit');
Route::put('/update_accounts/{id}', 'AccountsController@update');
});

Route::get('/sample', 'OrderController@sample');

// Route::get('/product', 'ProductController@index');

Route::get('/add_product/{id}', 'ProductController@add')->name('aproduct');

Route::get('/route_home', function()
{
	return redirect(route('home'));

});

// Route::
 
