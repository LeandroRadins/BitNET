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
    return redirect()->route('login');;
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {
    Route::resource('temas', 'TemaController');
    //Preguntas
    Route::get('temas/{tema}/nueva_pregunta', 'PreguntaController@create')->name('preguntas.create');
    Route::post('temas/{tema}/guardar_pregunta', 'PreguntaController@store')->name('preguntas.store');
    Route::get('temas/{tema}/{pregunta}', 'PreguntaController@show')->name('preguntas.show');
    Route::post('temas/{tema}/{pregunta}/guardar_respuesta', 'RespuestaController@store')->name('respuesta.store');
    Route::post('temas/{tema}/{pregunta}/{respuesta}/guardar_reputacion', 'ReputacionController@store')->name('reputacion.store');
    Route::get('mi_perfil', 'UserController@profile')->name('user.profile');
    Route::resource('users', 'UserController');
    Route::resource('roles', 'RolController');
});
