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
    Route::get('/pacientes/add', 'PacienteController@add')->name('pacientes.add');
    Route::post('/pacientes/save', 'PacienteController@save')->name('pacientes.save');
    Route::get('/pacientes/delete/{id}', 'PacienteController@delete')->name('pacientes.delete');
    Route::get('/pacientes/update/{id}', 'PacienteController@update')->name('pacientes.update');
    Route::post('/pacientes/update', 'PacienteController@put')->name('pacientes.put');
});
