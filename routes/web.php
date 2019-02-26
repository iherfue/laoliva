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

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/index', 'CertificadoController@index')->name('index');
Route::delete('certificado/{id}','CertificadoController@delete');

Route::get('certificado/delete/{id}', 'CertificadoController@show');

Route::get('/certificado/add','CertificadoController@create');
Route::post('/certificado/add','CertificadoController@store');

Route::get('/certificado/edit/{id}','CertificadoController@edit');

Route::put('/certificado/edit/{id}','CertificadoController@update');

Route::get('/certificado/generate','CertificadoController@generateView');
Route::post('/certificado/generate','CertificadoController@generate');

//pdf
Route::get('/certificado/vistaprevia/{id}','CertificadoController@VistaPrevia');
Route::get('/certificado/pdf/{id}','CertificadoController@pdf');