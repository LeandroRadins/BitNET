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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/ola', 'HomeController@index')->name('ola');
Route::get('/manolo', 'HomeController@index')->name('manolo');
Route::get('/home', 'HolaLeandro@index')->name('holaLeandro');
Route::get('/home', 'HolaDonPepito@index')->name('holaDonJose');
//a fer le gusta la bolita
