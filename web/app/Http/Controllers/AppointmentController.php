<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use App\Station;
use Carbon;
use Auth;
use App\Vehicle;

class AppointmentController extends Controller
{
    public function index(){
	return view('appointments.index', ['appointments' => Appointment::paginate(20)]);
    }

    public function all() {
	return response()->json(Appointment::all()->toArray());
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
	    'id' => 1, 'resourceId' => 3, 'start'=> strtotime('2017-04-03 7:30:00') * 1000, 'end' => strtotime('2017-04-03 7:45:00') * 1000
	]]);
    }

    public function createAppointment(Request $request) {

    }

    public function appointments(Appointment $appointment) {
	return view('appointments.index', ['appointments' => $appointment->appointments]);
    }

    public function create() {
	$vehicles = [];
	$stations = Station::all();
	if(Auth::check()) {
	    $vehicles = Auth::user()->vehicles;
	}
	return view('appointments.create', ['vehicles' => $vehicles, 'stations' => $stations, 'times' => []]);
    }

    public function generate() {
  $vehicles = [];
  $stations = Station::all();
  if(Auth::check()) {
      $vehicles = Auth::user()->vehicles;
  }
  return view('appointments.create', ['vehicles' => $vehicles, 'stations' => $stations, 'times' => []]);
    }

    public function times($date, $line, $startTime = '7:30') {
	$firstTime = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date . '07:30:00');
	$times = [];
	while($firstTime->lte(Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date . '16:00:00'))) {
	    if($firstTime->gt(Carbon\Carbon::create())) {
		$times[] = $firstTime->toTimeString();
	    }
	    $firstTime->addMinutes(15);
	}

	$reservedTimes = $this->getTimes($date, $line);
	$result = array_diff($times, $reservedTimes);

	return $result;
    }

    public function jsonTimes($date, $line, $startTime = null) {
	return response()->json($this->times($date, $line, $startTime));
    }


    //get reserved times from database.
    public function getTimes($date, $line) {
	$minDate = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($date) . '00:00:00');
	$maxDate = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($date) . '24:00:00');

	$date = Appointment::where('start', '>=', $minDate)->where('start', '<=', $maxDate)->where('resourceId', $line)->get();
	$results = [];
	foreach($date as $item) {
	    $results[] = $item->start->toTimeString();
	}
	return $results;
    }

    public function getAppointment($date, $station) {
	$minDate = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($date) . '00:00:00');
	$maxDate = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($date) . '24:00:00');

	$date = Appointment::where('start', '>=', $minDate)->where('start', '<=', $maxDate)->where('station_id', $station)->get();
	$results = [];
	foreach($date as $item) {
	    $results[] = $item->start->toTimeString();
	}
	return $results;
    }

    public function makeStartTime($month, $time) {
	$thisyear = Carbon\Carbon::createFromFormat('Y-m-d', month($month) . 'Y/m/d');
    	$finalyear = Carbon\Carbon::createFromFormat('Y-m-d', month($month) . 'Y/12/d');

    	$month = Appointment::where('date', '>=', $thisyear)->where('date', '<=', $finalyear)->where('vehicle_id', $time)->get();
    	$results = [];
    	foreach($month as $item) {
    	    $results[] = $item->date->toTimeString();
    	}
    	return $results;
    }

    public function getSection($date) {
	if($date->day <= 20)
	    return 1;
	return 2;
    }

    public function validateAppointment($vehicle_id, $start) {
	$currentMonth = Carbon\Carbon::create();
	$vehicle = Vehicle::find($vehicle_id)->first();
	$lastNumber = substr($vehicle->plate_number, -1);
	$allowedMonth = intval($lastNumber) + 1;
	$start = Carbon\Carbon::parse($start);

	if($start->diffInDays($currentMonth) <= 1) {
	    return true;
	} else {
	    if($start->month == $allowedMonth) {
		return true;
	    } else {
		if($this->getSection($start) == 2) {
		    return true;
		} else {
		    return false;
		}
	    }
	}
    }

    public function store(Request $request) {
	$this->validate($request, ['vehicle_id' => 'required'],['title' => 'required']);

	$data = $request->all();
	$startTime = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $data['month'] . $data['time']);
	$data['start'] = Carbon\Carbon::parse($startTime)->toDateTimeString();
	$data['end'] = Carbon\Carbon::parse($data['start'])->addMinutes(15)->toDateTimeString();

	if($this->validateAppointment($data['vehicle_id'], $data['start'])) {
	    Appointment::create($data);
	} else {
	    // return the rules.
	}

	return redirect()->route('appointment.index');
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
