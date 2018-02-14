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

Route::group(['middleware' => 'auth'], function() {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/penerima', 'PenerimaController');
    Route::resource('/donatur', 'DonaturController');
    Route::resource('/donasi', 'DonasiController');
    Route::resource('/distribusi', 'DistribusiController');
    Route::resource('/pemeliharaan', 'PemeliharaanController');
    Route::resource('/kelurahan', 'KelurahanController');
    Route::resource('/kecamatan', 'KecamatanController');
    Route::resource('/atm', 'AtmController');
    Route::resource('/user', 'UserController');
    Route::resource('/log', 'LogController', ['only' => ['index', 'destroy']]);
});

Auth::routes();

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
