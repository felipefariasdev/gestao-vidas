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

Route::group(['middleware' => ['auth']], function () {
    Route::get('/pacientes', 'PacienteController@index')->name('pacientes.index');
    Route::get('/pacientes/upload', 'PacienteController@upload')->name('pacientes.upload');
    Route::post('/pacientes/enviar', 'PacienteController@enviar')->name('pacientes.enviar');
});