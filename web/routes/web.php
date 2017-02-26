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

Route::get('/station', 'StationController@index')->name('station.index');
Route::get('/station/create', 'StationController@create')->name('station.create');
Route::post('/station', 'StationController@store')->name('station.store');
Route::get('/station/{station}/edit', 'StationController@edit')->name('station.edit');
Route::patch('/station', 'StationController@update')->name('station.update');
Route::delete('/station', 'StationController@delete')->name('station.delete');
Route::get('/station/{station}', 'StationController@lines')->name('station.lines');

Route::get('/vehicle','VehicleController@index')->name('vehicle.index');
Route::get('/vehicle/create','VehicleController@create')->name('vehicle.create');
Route::post('/vehicle','VehicleController@store')->name('vehicle.store');
Route::get('/vehicle/{vehicle}/edit', 'VehicleController@edit')->name('vehicle.edit');
Route::patch('/vehicle', 'VehicleController@update')->name('vehicle.update');;

Route::get('/line','LineController@index')->name('line.index');
Route::get('/line/create','LineController@create')->name('line.create');
Route::post('/line','LineController@store')->name('line.store');
Route::get('/line/{line}/edit', 'LineController@edit')->name('line.edit');
Route::patch('/line', 'LineController@update')->name('line.update');;
Route::delete('/line', 'LineController@delete')->name('line.delete');;

Route::get('/appointment','AppointmentController@index')->name('appointment.index');
Route::get('/appointment/create','AppointmentController@create')->name('appointment.create');
Route::post('/appointment','AppointmentController@store')->name('appointment.store');
Route::get('/appointment/{appointment}/edit', 'AppointmentController@edit')->name('appointment.edit');
Route::patch('/appointment', 'AppointmentController@update')->name('appointment.update');;

Auth::routes();

Route::get('/home', 'HomeController@index');
