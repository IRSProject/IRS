<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicle;
use Auth;

class VehicleController extends Controller
{
    public function index() {
	if(Auth::check()) {
	    $vehicles = Auth::user()->vehicles()->paginate(20);
	    return view('vehicles.index', ['vehicles' => $vehicles]);
	}
    }

    public function create() {
	return view('vehicles.create');
    }

    public function store(Request $request) {
	$vehicle = Vehicle::create($request->all());
	return redirect()->route('vehicle.index');
    }

    public function edit(Vehicle $vehicles) {
	return view('vehicles.edit', ['vehicle' => $vehicle]);
    }

    public function update(Request $request) {
	$vehicle = Vehicle::find($request->id);
	$vehicle->fill($request->all());
	$vehicle->save();
	return redirect()->route('vehicle.index');
    }
    public function delete(Request $request) {
	$vehicle = vehicle::find($request->id);
	if($vehicle) {
	    $vehicle->delete();
	}
	return redirect()->route('vehicle.index');
    }
}
