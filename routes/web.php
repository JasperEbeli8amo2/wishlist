<?php

Auth::routes();

Route::get('/', function () {
    return view('home');
});

Route::resource('wishlists', 'WishlistController');

Route::get('/wishlist', 'WishlistController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'SessionsController@destroy');

