<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use App\Station;
use Carbon;

class AppointmentController extends Controller
{
    public function index(){
	return view('appointments.index', ['appointments' => Appointment::paginate(20)]);
    }

    public function resources() {
	$stations = Station::all();
	$resources = [];

	foreach($stations as $station) {
	    $lines = $station->lines;
	    $linesResources = [];
	    foreach($lines as $line) {
		array_push($linesResources, ['id' =>  $line->id, 'title' => $line->number]);
	    }
	    array_push($resources, ['id' => 'b' . $station->id, 'title' => $station->name, 'children' => $linesResources]);
	}
	return response()->json($resources);
    }

    public function events() {
	$appointments = Appointment::all();

	//return response()->json([ Appointment::all()->toArray() ]);
	return response()->json([[
	    'id' => 1, 'resourceId' => 2, 'start'=> strtotime('2017-04-02 7:30:00') * 1000, 'end' => strtotime('2017-04-02 7:45:00') * 1000, 'title' => 'sss'
	]]);
    }

    public function createAppointment(Request $request) {

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
