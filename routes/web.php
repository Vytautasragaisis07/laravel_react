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
    return view('auth.login');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/add-category', 'CategoryController@AddCateg'); //psl
Route::POST('/store-category', 'CategoryController@StoreCateg'); //s-c yra uzklausa ne psl
Route::get('/control-category', 'CategoryController@ControlCateg');
Route::get('/warning-category/{category}', 'CategoryController@warningCateg');
Route::get('/delete_category/{category}', 'CategoryController@deleteCateg'); //d-c yra uzklausa ne psl

Route::get('/add-product', 'ProductController@AddProduct'); //psl
Route::POST('/store-product', 'ProductController@storeProduct');
Route::get('/control-product', 'ProductController@ControlProduct');
Route::get('/edit-product/product/{product}', 'ProductController@editProduct'); //psl
Route::POST('/edit_product/{product}', 'ProductController@edit_product'); //uzklausa redagavimui
Route::get('/warning-product/{product}', 'ProductController@warningProduct');
Route::get('/delete-product/{product}', 'ProductController@deleteProduct'); //d-p yra uzklausa ne psl

Route::get('/orders', 'OrderController@showOrders'); //psl
Route::get('/change-status/order/{order}', 'OrderController@changeStatus'); //psl
Route::POST('/change_status/{order}', 'OrderController@change_status'); //uzklausa
Route::get('/warning-order/{order}', 'OrderController@warningOrder');
Route::get('/delete-order/{order}', 'OrderController@deleteOrder');

Route::get('/logout', 'HomeController@atsijungti');


Auth::routes();
