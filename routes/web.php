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

Route::get('products', ['as' => 'products', 'uses' => 'PagesController@getProduct']);

Route::get('products/{id}', ['as' => 'producttype', 'uses' => 'PagesController@getProductType']);

Route::get('dong-ho-nam', ['as' => 'donghonam', 'uses' => 'PagesController@getMenWatch']);

Route::get('dong-ho-nam/{id}', ['as' => 'loai_donghonam', 'uses' => 'PagesController@getMenWatchType']);

Route::get('dong-ho-nu', ['as' => 'donghonu', 'uses' => 'PagesController@getWomenWatch']);

//Route::get('products/{id}', ['as' => 'producttype', 'uses' => 'PagesController@getProductType']);

Route::get('product-detail/{id}', ['as' => 'detail', 'uses' => 'PagesController@getProductDetail']);

Route::get('about', ['as' => 'about', 'uses' => 'PagesController@getAbout']);

Route::get('contact', ['as' => 'contact', 'uses' => 'PagesController@getContact']);

Route::get('login', ['as' => 'login', 'uses' => 'PagesController@getLogin']);

Route::post('login', ['as' => 'login', 'uses' => 'PagesController@postLogin']);

Route::get('logout', ['as' => 'logout', 'uses' => 'PagesController@postLogout']);

Route::get('register', ['as' => 'register', 'uses' => 'PagesController@getRegister']);

Route::post('register', ['as' => 'register', 'uses' => 'PagesController@postRegister']);

Route::get('search', ['as' => 'search', 'uses' => 'PagesController@getSearch']);

Route::get('shopping-cart', ['as' => 'cart', 'uses' => 'PagesController@getCart']);

Route::get('empty-cart', ['as' => 'emptycart', 'uses' => 'PagesController@getEmptyCart']);

Route::get('add-to-cart/{id}', ['as' => 'addtocart', 'uses' => 'PagesController@getAddToCart']);

Route::get('del-cart/{id}', ['as' => 'delcart', 'uses' => 'PagesController@getDelItemCart']);

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

Route::get('admin/bills', 'AdminController@getBills')->name('bills');

Route::post('admin/bills/editstatus', 'BillsController@editBillsStatus')->name('editBillsStatus');

Route::group(['prefix'=>'type_product'],function(){
	Route::get('list',['as'=>'Tproduct.list','uses'=>'AdminController@getList']);
	Route::get('add',['as'=>'Tproduct.getadd','uses'=>'AdminController@getadd_type_product']);
	Route::post('add',['as'=>'Tproduct.postadd','uses'=>'AdminController@postadd_type_product']);
	Route::get('delete/{id}',['as'=>'Tproduct.getDelete','uses'=>'AdminController@delete_type_product']);
	Route::get('edit/{id}',['as'=>'Tproduct.getEdit','uses'=>'AdminController@getedit_type_product']);
	Route::post('edit/{id}',['as'=>'Tproduct.postEdit','uses'=>'AdminController@postedit_type_product']);
});

Route::group(['prefix'=>'customer'],function()
{
	Route::get('add',['as'=>'customer.getAdd','uses'=>'AdminController@getAdd_customer']);
	Route::post('add',['as'=>'customer.postAdd','uses'=>'AdminController@postAdd_customer']);
	Route::get('edit/{id}',['as'=>'customer.getEdit','uses'=>'AdminController@getEdit_customer']);
	Route::post('edit/{id}',['as'=>'customer.postEdit','uses'=>'AdminController@postEdit_customer']);
	Route::get('delete/{id}',['as'=>'customer.getDelete','uses'=>'AdminController@getDelelte_customer']);

});