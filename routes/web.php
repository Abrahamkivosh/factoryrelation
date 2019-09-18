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

Route::get('/tasks','TaskController@index');
Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('chart', 'ReallifechatController');
Route::get('send',  'ReallifechatController@send')->name('send');
Route::get('mail',  'ReallifechatController@mail');

Route::resource('customer', 'CustomerController');
