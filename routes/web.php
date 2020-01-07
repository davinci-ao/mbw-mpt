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
Route::get('/admin', 'BookingController@admin')->name('admin');


Route::get('/account', 'HomeController@accountAction')->name('account');
Route::get('/account/edit', 'HomeController@editAccount')->name('editAccount');
Route::post('/account/delete', 'HomeController@deleteAccount')->name('deleteAccount');
Route::post('/account/store', 'HomeController@storeAccount')->name('storeAccount');
Route::post('/account/changepass', 'HomeController@changePassAccount')->name('changePassAccount');

Route::resource('/chalets', 'ChaletController');

Route::get('/contact', 'MessageController@index')->name('contact');
Route::post('/contact/store', 'MessageController@store')->name('contactStore');
Route::get('/contact/list', 'MessageController@list')->name('contactList');
Route::get('/contact/delete', 'MessageController@destroy')->name('contactDelete');

Auth::routes();
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

// Vakantiepark
Route::resource('/holidayparks', 'HolidayparkController');

// Route::get('/holidayparks', 'HolidayparkController@index')->name('holidayparks');
// Route::get('/holidayparks/create', 'HolidayparkController@create')->name('holidayparksCreate');
// Route::post('/holidayparks', 'HolidayparkController@store')->name('holidayparksStore');

// Route::patch('/holidayparks/store', ['as' => 'holidayparks.store', 'uses' => 'HolidayparkController@store']);
// Route::post('/store', "HolidayparkController@store");
// Route::patch('/holidayparks/create', ['as' => 'holidayparks.create', 'uses' => 'HolidayparkController@create']);

// bookings
Route::resource('/bookings', 'BookingController');

Route::get('/booking/delete', 'BookingController@destroy')->name('bookingDelete');

// chalet detail
Route::resource('/detail', 'ChaletDetailController');