<?php

Route::get('/', 'HomeController@index')->name('home');

Route::get('/mortgage', 'Mortgage\MortgageController@index')->name('mortgage.index');
Route::get('/mortgage/rates', 'Mortgage\MortgageController@rates');

Route::get('/blog/{slug}', 'Blog\BlogController@story')->name('blog.story');

Route::get('/oa/mortgage/{productIds}/{marketId?}', 'Mortgage\OAServiceController@index');
