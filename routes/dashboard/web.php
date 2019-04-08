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
Route::prefix('dashboard')->name('dashboard.')->group(function(){


	// for main dashboard page
 Route::get('/index','AdminController@index')->name('index');
 // for show only log in form for admin
 Route::get('/login','AdminLoginController@showLoginForm')->name('login');
 // for check this login input found in database 
 Route::post('/login','AdminLoginController@login')->name('login.submit');
 // this for register new field in dadabase table admins
  Route::post('/login','AdminLoginController@login')->name('login.submit');  	

	

});

// this route belong admin routes
Route::prefix('dashboard/admin/')->name('dashboard.admin.')->group(function(){

 Route::get('show','admins\AdminController@show')->name('show');
 Route::get('add','admins\AdminController@create')->name('add');
 Route::post('store','admins\AdminController@store')->name('store');
 Route::get('edit','admins\AdminController@edit')->name('edit');
 Route::get('edit_single/{id}','admins\AdminController@edit_single')->name('edit_single');
 Route::post('update/{id}','admins\AdminController@update')->name('update');
 Route::get('delete','admins\AdminController@delete')->name('delete');

 Route::get('delete/{id}','admins\AdminController@delete_admin')->name('delete_admin');
 
});

// this route belong category

Route::prefix('dashboard/category/')->name('dashboard.category.')->group(function(){


 Route::get('show','category\CategoryController@show')->name('show');
 Route::get('add','category\CategoryController@create')->name('add');
 Route::post('store','category\CategoryController@store')->name('store');
 Route::get('edit','category\CategoryController@edit')->name('edit');
 Route::get('edit_category/{id}','category\CategoryController@edit_category')->name('edit_category');
 Route::post('update/{id}','category\CategoryController@update')->name('update');
 Route::get('delete','category\CategoryController@delete')->name('delete');

 Route::get('delete/{id}','category\CategoryController@delete_category')->name('delete_category');
});


// this for product route prodcut
Route::prefix('dashboard/product/')->name('dashboard.product.')->group(function(){
 Route::get('show','product\ProductsController@show')->name('show');
 Route::get('add','product\ProductsController@create')->name('add');
 Route::post('store','product\ProductsController@store')->name('store');
 Route::get('edit','product\ProductsController@edit')->name('edit');
 Route::get('edit_product/{id}','product\ProductsController@edit_product')->name('edit_product');
 Route::post('update/{id}','product\ProductsController@update')->name('update');
 Route::get('delete','product\ProductsController@delete')->name('delete');

 Route::get('delete/{id}','product\ProductsController@delete_product')->name('delete_product');
});


// this for client 

// this for product route prodcut
Route::prefix('dashboard/client/')->name('dashboard.client.')->group(function(){
 
 Route::get('show','client\ClientController@show')->name('show');
 Route::get('add','client\ClientController@create')->name('add');
 Route::post('store','client\ClientController@store')->name('store');
 Route::get('edit','client\ClientController@edit')->name('edit');
 Route::get('edit_client/{id}','client\ClientController@edit_client')->name('edit_client');
 Route::post('update/{id}','client\ClientController@update')->name('update');
 Route::get('delete','client\ClientController@delete')->name('delete');

 Route::get('delete/{id}','client\ClientController@delete_client')->name('delete_client');
});

// this for product route order
Route::prefix('dashboard/order/')->name('dashboard.order.')->group(function(){
 
 Route::get('show','order\OrderController@show')->name('show');
 Route::get('add/{id}','order\OrderController@create')->name('add');
 Route::get('calc','order\OrderController@calc')->name('calc');
 Route::post('store','order\OrderController@store')->name('store');
 Route::get('edit','order\OrderController@edit')->name('edit');
 Route::get('edit_order/{id}','order\OrderController@edit_order')->name('edit_order');
 Route::post('update/{id}','order\OrderController@update')->name('update');
 Route::get('delete','order\OrderController@delete')->name('delete');

 Route::get('delete/{id}','client\ClientController@delete_client')->name('delete_client');
});
