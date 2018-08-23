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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [

	'uses' => 'FrontEndController@index',
	'as' => 'index'

]);

Route::get('/product/category/{id}', [

	'uses' => 'FrontEndController@index_single_category',
	'as' => 'product.index.single.category'

]);

Route::get('/product/subcategory/{id}', [

	'uses' => 'FrontEndController@index_single_subcategory',
	'as' => 'product.index.single.subcategory'

]);

Route::get('/product/single/{id}', [

	'uses' => 'FrontEndController@single',
	'as' => 'product.single'

]);

Route::post('/cart/add', [

	'uses' => 'ShoppingController@add_to_cart',
	'as' => 'cart.add'

]);


Route::get('/cart', [

	'uses' => 'ShoppingController@cart',
	'as' => 'cart'

]);

Route::get('/cart/delete/{id}', [

	'uses' => 'ShoppingController@cart_delete',
	'as' => 'cart.delete'

]);

Route::get('/cart/incr/{id}/{qty}', [

	'uses' => 'ShoppingController@incr',
	'as' => 'cart.incr'

]);

Route::get('/cart/decr/{id}/{qty}', [

	'uses' => 'ShoppingController@decr',
	'as' => 'cart.decr'

]);

Route::get('/cart/rapid/add/{id}', [

	'uses' => 'ShoppingController@rapid_add',
	'as' => 'cart.rapid.add'

]);




Route::get('/about', 'PagesController@about')->name('about');
Route::get('/contact', 'PagesController@contact')->name('contact');
Route::get('/faq', 'PagesController@faq')->name('faq');
Route::get('/policy', 'PagesController@policy')->name('policy');
Route::get('/term', 'PagesController@term')->name('term');
Route::get('/howto', 'PagesController@howto')->name('howto');

Route::get('/payment/confirm', 'PagesController@paymentconfirm')->name('payment.confirm');

Route::post('/payment/confirms/store', [

	'uses' => 'PagesController@paymentStore',
	'as' => 'payment.store2'

]);

Route::get('/paymentconfirm', 'PaymentConfirmController@index')->name('payment.index');
Route::get('/paymentconfirm/detail/{id}', 'PaymentConfirmController@detail')->name('payment.detail');
Route::get('/paymentconfirm/delete/{id}', 'PaymentConfirmController@destroy')->name('payment.destroy');
Route::get('/paymentconfirm/change/status/{id}', 'PaymentConfirmController@change')->name('payment.change');


Route::get('login/facebook', 'Auth\AuthController@redirectToFacebook');
Route::get('login/facebook/callback', 'Auth\AuthController@getFacebookCallback');

Route::get('login/github', 'Auth\AuthController@redirectToProvider');
Route::get('login/github/callback', 'Auth\AuthController@handleProviderCallback');

Route::resource('products', 'ProductsController');

Auth::routes();

Route::get('/admin', 'HomeController@index')->name('home');

Route::resource('category', 'CategoryController');
Route::resource('subcategory', 'SubCategoryController');
Route::resource('tag', 'TagController');
Route::resource('optional', 'OptionalController');
Route::resource('customer', 'CustomerController');
Route::resource('order', 'OrderController');

Route::get('change/order/stat/{id}', 'OrderController@status')->name('order.status');


Route::get('photo/gallery/', [

	'uses' => 'PhotoController@index',
	'as' => 'photo.index'
 
]);

Route::get('photo/gallery/delete/{id}', [

	'uses' => 'PhotoController@destroy',
	'as' => 'photo.destroy'
 
]);

Route::get('photo/view/{id}', [

	'uses' => 'PhotoController@index2',
	'as' => 'photo.index2'
 
]);

Route::get('photo/add/{id}', [

	'uses' => 'PhotoController@create',
	'as' => 'photo.create'
 
]);

Route::get('photo/delete/{id}', [

	'uses' => 'PhotoController@destroy2',
	'as' => 'photo.destroy2'
 
]);

Route::post('photo/store/', [

	'uses' => 'PhotoController@store',
	'as' => 'photo.store'
 
]);


Route::get('photo/edit/{id}', [

	'uses' => 'PhotoController@edit',
	'as' => 'photo.edit'
 
]);

Route::post('photo/update/{id}', [

	'uses' => 'PhotoController@update',
	'as' => 'photo.update'
 
]);

Route::get('customer/history/{id}', [

	'uses' => 'CustomerController@history',
	'as' => 'customer.view'
]);


Route::prefix('customer')->group(function() {


	Route::get('/customer/login', 'Auth\CustomerLoginController@showLoginForm')->name('customer.login');
	Route::post('/customer/login', 'Auth\CustomerLoginController@login')->name('customer.login.submit');

	Route::get('/customer/registrasi', 'CustomerssController@index')->name('regis.customer');

	Route::post('/customer/store',[

		'uses' => 'CustomerssController@store',
		'as' => 'customer.store'
			
	]);

	Route::get('/customer/checkout', [

		'uses' => 'CheckoutController@index',
		'as' => 'customer.checkout'

	]);

	Route::post('/customer/pay', [

		'uses' => 'CheckoutController@pay',
		'as' => 'customer.pay'

	]);

	Route::post('/customer/password/email','Auth\CustomerForgotPasswordController@sendResetLinkEmail')->name('customer.password.email');
    Route::get('/customer/password/reset','Auth\CustomerForgotPasswordController@showLinkRequestForm')->name('customer.password.request');
    Route::post('/customer/password/reset','Auth\CustomerResetPasswordController@reset');
    Route::get('/customer/password/reset/{token}','Auth\CustomerResetPasswordController@showResetForm')->name('customer.password.reset');

    



});



