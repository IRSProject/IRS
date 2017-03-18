<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;

class AppointmentController extends Controller
{
    public function index(){
	return view('appointments.index', ['appointments' => Appointment::paginate(20)]);
    }

    public function appointments(Appointment $appointment) {
	return view('appointments.index', ['appointments' => $appointment->appointments]);
    }
    public function create() {
	return view('appointments.create');
    }

    public function store(Request $request) {
	//dd($request->all());
	Appointment::create($request->all());
	return redirect()->route('station.appointments', ['station' => $request->station_id]);
    }

    public function edit(Appointment $appointment) {
	return view('appointments.edit', ['appointment' => $appointment]);
    }

    public function update(Request $request) {
	$appointment = appointment::find($request->id);
	$appointment->fill($request->all());
	$appointment->save();
	return redirect()->route('station.appointments', ['station' => $request->station_id]);
    }
    public function delete(Request $request) {
	$appointment = appointment::find($request->id);
	if($appointment) {
	    $appointment->delete();
	}
	return redirect()->route('station.appointments', ['station' => $request->station_id]);
    } 
}
