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

Route::get('product-detail', ['as' => 'detail', 'uses' => 'PagesController@getProductDetail']);

Route::get('about', ['as' => 'about', 'uses' => 'PagesController@getAbout']);

Route::get('contact', ['as' => 'contact', 'uses' => 'PagesController@getContact']);

Route::get('login', ['as' => 'login', 'uses' => 'PagesController@getLogin']);

Route::post('login', ['as' => 'login', 'uses' => 'PagesController@postLogin']);

Route::get('logout', ['as' => 'logout', 'uses' => 'PagesController@postLogout']);

Route::get('register', ['as' => 'register', 'uses' => 'PagesController@getRegister']);

Route::post('register', ['as' => 'register', 'uses' => 'PagesController@postRegister']);

Route::get('search', ['as' => 'search', 'uses' => 'PagesController@getSearch']);

Route::get('shopping-cart', ['as' => 'cart', 'uses' => 'PagesController@getCheckOut']);

Route::get('/redirect/{social}', 'SocialAuthController@redirect')->name('loginBySocial');

Route::get('/callback/{social}', 'SocialAuthController@callback');

Route::get('admin/index', 'AdminController@getIndex');

Route::get('admin/getproduct', 'AdminController@getProductManager');

Route::get('admin/addproduct', 'AdminController@getAddProduct');

Route::get('admin/index', 'AdminController@getIndex')->name('adminIndex');

Route::get('admin/getproduct', 'AdminController@getProductManager')->name('product');

Route::get('admin/addproduct', 'AdminController@getAddProduct')->name('addProductForm');

Route::post('admin/products/delete/{id}', 'ProductController@destroy');

Route::get('admin/products/delete/{id}', 'ProductController@destroy');

Route::get('admin/products/delete/{id}', 'ProductController@destroy')->name('delete');

Route::post('admin/products/add', 'ProductController@create')->name('addProduct');

Route::get('admin/edit/{id}', 'AdminController@getAddProduct')->name('editProductForm');

Route::get('admin/products/getpost/{id}', 'ProductController@getPost')->name('getPost');

Route::post('admin/products/edit/{id}', 'ProductController@edit')->name('editProduct');

