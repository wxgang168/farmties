<?php

Route::get('/', function () {
    return view('pages.index');
})->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function() {

	Route::resource('commodities', 'CommodityController');
	Route::resource('services', 'ServiceController');
	Route::resource('sliders', 'SliderController');
	Route::get('/orders', 'AdminOrderController@index')->name('admin.orders.index');
	Route::get('/orders/{order}/edit', 'AdminOrderController@edit')->name('admin.orders.edit');
	Route::patch('/orders/{order}/update', 'AdminOrderController@update')->name('admin.orders.update');

	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/', 'AdminController@index')->name('admin.dashboard');
	Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

});

Route::prefix('dashboard')->group(function() {

	Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay'); 
	Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');

	Route::resource('/orders', 'OrderController');
	Route::resource('/cart', 'CartController');
	Route::post('/cart/remove/commodities/{commodity}', 'CartController@removeRow');
	Route::get('/stocks', 'DashboardController@stocks')->name('display.stocks');
	Route::get('/', 'DashboardController@index')->name('user.dashboard');
	Route::get('/profile', 'DashboardController@profile')->name('user.profile');
	Route::post('/update/values', 'CartController@updateValues')->name('update.values');
	Route::post('/calculate/stock/sale', 'DashboardController@sale')->name('calculate.sale');
	Route::post('/sales/figures/', 'DashboardController@calculateSale')->name('sale.figure');
	Route::post('/view/commodity', 'DashboardController@display')->name('display.commodity');
	Route::post('/profile/update', 'DashboardController@update')->name('user.profile.update');
	Route::patch('/profile/change/{profile}', 'DashboardController@patchProfile')->name('user.profile.change');
	Route::patch('/stocks/{stock}/sale', 'StockController@update')->name('make.sale');

});
