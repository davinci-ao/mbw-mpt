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

// Route::get('/{any}', 'SinglePageController@index')->where('any', '.*');

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/chalets', 'ChaletController');

Route::get('/contact', 'MessageController@index')->name('contact');
Route::post('/contact/store', 'MessageController@store')->name('contactStore');
Route::get('/contact/list', 'MessageController@list')->name('contactList');
Route::get('/contact/delete', 'MessageController@destroy')->name('contactDelete');