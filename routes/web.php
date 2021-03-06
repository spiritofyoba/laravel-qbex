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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'MessageController@index')->name('home');

Route::get('/message/{message}', 'MessageController@show')->name('message');

Route::post('/home', 'MessageController@store');

Route::patch('/message/{message}', 'MessageController@status')->name('status');
