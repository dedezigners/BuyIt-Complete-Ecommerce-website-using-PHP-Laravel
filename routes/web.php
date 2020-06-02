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

Route::get('/', [
    'uses'      =>      'FrontendController@index',
    'as'        =>      'index'
]);

Route::get('/shop', [
    'uses'      =>      'FrontendController@shop',
    'as'        =>      'shop'
]);

Route::get('/shop-list', [
    'uses'      =>      'FrontendController@shopList',
    'as'        =>      'shop.list'
]);

Route::get('/help', function(){
    return view('help', [
        'title' => 'Support Center'
    ]);
})->name('help');

Route::get('/product/{product}', [
    'uses'      =>      'FrontendController@singleProduct',
    'as'        =>      'product.single'
]);

Auth::routes();

Route::get('/dashboard', [
    'uses'      =>      'DashboardController@index',
    'as'        =>      'dashboard'
]);

Route::resource('categories', 'CategoriesController');
Route::resource('products', 'ProductsController');

Route::get('/account/dashboard', 'HomeController@index')->name('account');
Route::get('/account/profile', 'HomeController@profile')->name('profile');
Route::get('/account/orders', 'HomeController@orders')->name('orders');
Route::get('/account/wishlist', 'HomeController@wishlist')->name('wishlist');
Route::get('/account/order/track', 'HomeController@track_orders')->name('order.track');

Route::post('/cart/add', [
    'uses'      =>      'ShoppingController@add_to_cart',
    'as'        =>      'cart.add'
]);

Route::get('/cart/add/{product}', [
    'uses'      =>      'ShoppingController@rapid_add_to_cart',
    'as'        =>      'cart.rapid'
]);

Route::post('/cart/update', [
    'uses'      =>      'ShoppingController@update_cart',
    'as'        =>      'cart.update'
]);

Route::get('/cart', [
    'uses'      =>      'ShoppingController@cart',
    'as'        =>      'cart'
]);


Route::get('/cart/delete/{id}', [
    'uses'      =>      'ShoppingController@cart_item_delete',
    'as'        =>      'cart.delete'
]);
    

Route::get('/checkout', [
    'uses'      =>      'CheckoutController@index',
    'as'        =>      'checkout'
]);

Route::post('/checkout', [
    'uses'      =>      'CheckoutController@stripe_charge',
    'as'        =>      'checkout.charge'
]);
