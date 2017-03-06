<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicle;

class VehicleController extends Controller
{
    public function index() {
	$vehicles = Vehicle::paginate(20);
	return view('vehicles.index', ['vehicles' => $vehicles]);
    }

    public function create() {
	return view('vehicles.create');
    }

    public function store(Request $request) {
	Vehicle::create($request->all());
    }

    public function edit(Vehicle $vehicles) {
	return view('vehicles.edit', ['vehicle' => $vehicle]);
    }

    public function update(Request $request) {
	$vehicle = Vehicle::find($request->id);
	$vehicle->fill($request->all());
	$vehicle->save();
	return back();
}
}
