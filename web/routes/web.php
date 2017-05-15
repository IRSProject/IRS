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
    return view('index');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/license', function () {
    return view('license');
});

Route::group(['middleware' => 'auth'], function () {

    Route::get('/vehicle','VehicleController@index')->name('vehicle.index');
    Route::get('/vehicle/create','VehicleController@create')->name('vehicle.create');
    Route::post('/vehicle','VehicleController@store')->name('vehicle.store');
    Route::get('/vehicle/{vehicle}/edit', 'VehicleController@edit')->name('vehicle.edit');
    Route::patch('/vehicle', 'VehicleController@update')->name('vehicle.update');;
    Route::delete('/vehicle', 'VehicleController@delete')->name('vehicle.delete');

    Route::get('/appointment','AppointmentController@index')->name('appointment.index');
    Route::get('/appointment/create','AppointmentController@create')->name('appointment.create');
    Route::get('/appointment/generate','AppointmentController@generate')->name('appointment.generate');
    Route::post('/appointment','AppointmentController@store')->name('appointment.store');
    Route::post('/appointment/storegenerated','AppointmentController@storeGenerated')->name('appointment.accept');
    Route::get('/appointment/{appointment}/edit', 'AppointmentController@edit')->name('appointment.edit');
    Route::patch('/appointment', 'AppointmentController@update')->name('appointment.update');;
    Route::delete('/appointment', 'AppointmentController@delete')->name('appointment.delete');
    Route::get('/appointment/times', 'AppointmentController@times')->name('appointment.times');
    Route::get('/appointment/myapp', 'AppointmentController@myapp')->name('appointment.myapp');
    Route::get('/appointment/generates', 'AppointmentController@generates')->name('appointment.generates');
    Route::get('/appointment/resources', 'AppointmentController@resources')->name('appointment.resources');

    Route::get('/profile','ProfileController@index')->name('profile.index');
    Route::post('/profile','ProfileController@store')->name('profile.store');
    Route::get('/profile/{user}/edit', 'ProfileController@edit')->name('profile.edit');
    Route::patch('/profile', 'ProfileController@update')->name('profile.update');;

    Route::get('/auth/{auth}/edit', 'RegisterController@edit')->name('auth.edit');

    Route::get('/line','LineController@index')->name('line.index');

    Route::get('/station', 'StationController@index')->name('station.index');
});

Route::group(['middleware' => ['App\Http\Middleware\Admin', 'auth']], function () {
    Route::post('/appointment/create', 'AppointmentController@createAppointment')->name('appointment.create');
    Route::get('/appointment/events', 'AppointmentController@events')->name('appointment.events');
    Route::get('/appointment/allapp', 'AppointmentController@allapp')->name('appointment.allapp');
    Route::get('/appointment/todayapp', 'AppointmentController@todayapp')->name('appointment.todayapp');

    Route::get('/vehicle/allveh', 'VehicleController@allveh')->name('vehicle.allveh');

    Route::get('/station/create', 'StationController@create')->name('station.create');
    Route::post('/station', 'StationController@store')->name('station.store');

    Route::get('/station/{station}/appointments', 'StationController@appointments')->name('station.appointments');
    Route::get('/station/{station}/edit', 'StationController@edit')->name('station.edit');
    Route::patch('/station', 'StationController@update')->name('station.update');
    Route::delete('/station', 'StationController@delete')->name('station.delete');
    Route::get('/station/{station}', 'StationController@lines')->name('station.lines');

    Route::get('/line/create','LineController@create')->name('line.create');
    Route::post('/line','LineController@store')->name('line.store');
    Route::get('/line/{line}/edit', 'LineController@edit')->name('line.edit');
    Route::patch('/line', 'LineController@update')->name('line.update');;
    Route::delete('/line', 'LineController@delete')->name('line.delete');;

    Route::get('/user','UserController@index')->name('user.index');
    Route::get('/user/create','UserController@create')->name('user.create');
    Route::post('/user','UserController@store')->name('user.store');
    Route::get('/user/{user}/edit', 'UserController@edit')->name('user.edit');
    Route::patch('/user', 'UserController@update')->name('user.update');;
    Route::delete('/user', 'UserController@delete')->name('user.delete');;
});


Route::get('/api/v1/station/{station}/lines','StationController@apiLines')->name('api.v1.station.lines');
Route::get('/api/v1/appointments','AppointmentController@all')->name('api.v1.appointments.all');
Route::get('/api/v1/times/{date}/{line}', 'AppointmentController@jsonTimes')->name('api.v1.jsontimes');
Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('pagenotfound', ['as' => 'notfound','uses'=>'HomeController@pagenotfound']);
