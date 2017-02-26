<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Vehicle extends Controller
{
    public function index() {
	return view('vehicles.create');
    }

    public function store(Request $request) {
	Vehicle::create($request->all());
    }

    public function edit(Vehicle $vehicles) {
	return view('vehicles.edit', ['vehicles' => $vehicles]);
    }

    public function update(Request $request) {
	$vehicle = Vehicle::find($request->id);
	$vehicle->fill($request->all());
	$vehicle->save();
	return back();
}
