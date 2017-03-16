<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Station;
use App\Appointment;

class StationController extends Controller
{
    public function index() {
	return view('stations.index', ['stations' => Station::paginate(20)]);
    }

    public function appointments(Station $station) {
	$appointments = $station->appointments;
	
	return view('appointments.index', ['appointments' => $appointments, 'station' => $station->name]);
    }

    public function lines(Station $station) {
	return view('lines.index', ['lines' => $station->lines]);
    }

    public function create() {
	return view('stations.create');
    }

    public function store(Request $request) {
	Station::create($request->all());
	return redirect()->route('station.index');
    }

    public function edit(Station $station) {
	return view('stations.edit', ['station' => $station]);
    }

    public function update(Request $request) {
	$station = Station::find($request->id);
	$station->fill($request->all());
	$station->save();
	return redirect()->route('station.index');
    }

    public function delete(Request $request) {
	$station = Station::find($request->id);
	if($station) {
	    $station->delete();
	}
	return redirect()->route('station.index');
    } 
}
