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

Route::get('/', 'HomeController@overview');

Route::get('/about', function () {
    return view('pages.about_page.about');
});

Route::get('/contact', function () {
    return view('pages.contact_page.contact');
});



// SHOP

Route::get('/shop', 'ShopController@shopAll');

Route::get('/shop/search', 'ShopController@shopSearch');

Route::get('/shop/gender/{gender}', 'ShopController@shopByGender');

Route::get('/shop/type/{type}', 'ShopController@shopByType');

Route::get('/shop/create', 'ShopController@create'); 

Route::post('/shop', 'ShopController@store');

Route::delete('/shop/{shop}', 'ShopController@destroy');

Route::get('/shop/{id}/edit', 'ShopController@edit');

Route::put('/shop/{id}', 'ShopController@update');

Route::get('/shop/{id}', 'ShopController@detail');



// CART

Route::get('/cart', 'CartController@showOrder');

Route::post('/cart/{id}', 'CartController@updateOrder');

Route::get('/cart/{id}', 'CartController@updateFromCart');

Route::get('/cart/remove/{id}', 'CartController@removeOrder');

Route::get('/checkout', 'CartController@clearOrder');

Route::get('/receipt', 'PdfController@printReceipt');



// WISHLIST

Route::get('/wishlist', 'WishlistController@showWishlist');

Route::get('/wishlist/{id}', 'WishlistController@updateWishlist');



// PROFILE

Route::get('/profile', 'ProfileController@showProfile');

Route::get('/profile/edit', 'ProfileController@editProfile');

Route::put('/profile', 'ProfileController@updateProfile');

Route::delete('/profile', 'ProfileController@destroyUser');



// AUTH

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
