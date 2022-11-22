<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'WebsiteController@index');
Route::get('/stores', 'WebsiteController@stores');
Route::get('/stores/{id}', 'WebsiteController@showStore');
Route::get('/products', 'WebsiteController@products');
Route::get('/products/purchase/{id}', 'WebsiteController@purchase');
Route::get('/search', 'WebsiteController@search');

Auth::routes();
Route::get('/admin/dashboard', 'HomeController@index');

Route::get('/admin/stores', 'StoreController@index')->middleware('auth');
Route::get('/admin/stores/create', 'StoreController@create')->middleware('auth');
Route::post('/admin/stores/store', 'StoreController@store')->middleware('auth');
Route::delete('/admin/stores/delete/{id}', 'StoreController@destroy')->middleware('auth');
Route::get('/admin/stores/edit/{id}', 'StoreController@edit')->middleware('auth');
Route::put('/admin/stores/update/{id}', 'StoreController@update')->middleware('auth');
Route::get('/admin/stores/{id}', 'StoreController@show')->middleware('auth');

Route::get('/admin/products', 'ProductController@index')->middleware('auth');
Route::get('/admin/products/create', 'ProductController@create')->middleware('auth');
Route::post('/admin/products/store', 'ProductController@store')->middleware('auth');
Route::get('/admin/products/deleted', 'ProductController@deletedProducts')->middleware('auth');
Route::delete('/admin/products/delete/{id}', 'ProductController@destroy')->middleware('auth');
Route::get('/admin/products/edit/{id}', 'ProductController@edit')->middleware('auth');
Route::put('/admin/products/update/{id}', 'ProductController@update')->middleware('auth');
Route::get('/admin/products/{id}', 'ProductController@show')->middleware('auth');


Route::get('/admin/purchases', 'PurchaseController@index')->middleware('auth');

Route::get('/admin/profile', 'UserController@index')->middleware('auth');
