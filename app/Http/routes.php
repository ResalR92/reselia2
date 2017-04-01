<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','CatalogsController@index');
Route::get('/catalogs','CatalogsController@index');

Route::auth();
Route::get('/home', 'HomeController@index');

Route::resource('categories','CategoriesController');
Route::resource('products','ProductsController');

Route::post('cart','CartController@addProduct');
