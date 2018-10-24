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

Route::get('products/{type}', ['as' => 'producttype', 'uses' => 'PagesController@getProductType']);

Route::get('product-detail', ['as' => 'detail', 'uses' => 'PagesController@getProductDetail']);

Route::get('contact', ['as' => 'contact', 'uses' => 'PagesController@getContact']);

Route::get('login', ['as' => 'login', 'uses' => 'PagesController@getLogin']);

Route::get('register', ['as' => 'register', 'uses' => 'PagesController@getRegister']);

Route::get('shopping-cart', ['as' => 'cart', 'uses' => 'PagesController@getCheckOut']);

Route::get('/redirect/{social}', 'SocialAuthController@redirect')->name('loginBySocial');

Route::get('/callback/{social}', 'SocialAuthController@callback');