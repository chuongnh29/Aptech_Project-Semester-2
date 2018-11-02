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

Route::get('/', ['as' => 'home', 'uses' => 'PagesController@getIndex']);

Route::get('dong-ho-nam', ['as' => 'donghonam', 'uses' => 'PagesController@getMenWatch']);

Route::get('dong-ho-nu', ['as' => 'donghonu', 'uses' => 'PagesController@getWomenWatch']);

Route::get('products/{type}', ['as' => 'producttype', 'uses' => 'PagesController@getProductType']);

Route::get('product-detail/{id}', ['as' => 'detail', 'uses' => 'PagesController@getProductDetail']);

Route::get('about', ['as' => 'about', 'uses' => 'PagesController@getAbout']);

Route::get('contact', ['as' => 'contact', 'uses' => 'PagesController@getContact']);

Route::get('login', ['as' => 'login', 'uses' => 'PagesController@getLogin']);

Route::get('register', ['as' => 'register', 'uses' => 'PagesController@getRegister']);

Route::get('shopping-cart', ['as' => 'cart', 'uses' => 'PagesController@getCheckOut']);