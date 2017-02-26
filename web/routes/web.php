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

Route::get('/station', 'StationController@index')->name('station.create');
Route::post('/station', 'StationController@store')->name('station.store');
Route::get('/station/{station}/edit', 'StationController@edit')->name('station.edit');
Route::patch('/station', 'StationController@update')->name('station.update');

Route::get('/vehicle','VehicleController@index')->name('vehicle.create');
Route::post('/vehicle','VehicleController@store')->name('vehicle.store');
Route::get('/vehicle/{vehicle}/edit', 'VehicleController@edit')->name('vehicle.edit');
Route::patch('/vehicle', 'VehicleController@update')->name('vehicle.update');;

Auth::routes();

Route::get('/home', 'HomeController@index');
