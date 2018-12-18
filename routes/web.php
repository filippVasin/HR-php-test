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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::get('/weather', 'WeatherController@index')->name('weather');

Route::get('/orders', 'OrderController@index')->name('orders');

Route::get('/order/{id}', 'OrderController@order')->name('order');

Route::post('/order/save', 'OrderController@save')->name('save');
