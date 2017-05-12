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
  $this->validate($request, ['plate_number' => 'required', 'plate_code' => 'required', 'brand' => 'required'
                            , 'model' => 'required', 'production_year' => 'required', 'color' => 'required'
                            , 'chassis_number' => 'required', 'engine_number' => 'required', 'aquisition_date' => 'required'
                            , 'type' => 'required', 'operation_year' => 'required']);
	return redirect()->route('vehicle.index');
    }



    public function edit(Vehicle $vehicle) {
	return view('vehicles.edit', ['vehicle' => $vehicle]);
    }

    public function update(Request $request) {
	$vehicle = Vehicle::find($request->id);
	$vehicle->fill($request->all());
	$vehicle->save();
	return redirect()->route('vehicle.index');
    }

    public function delete(Request $request) {
	$vehicle = Vehicle::find($request->id);
	if($vehicle) {
	    $vehicle->delete();
	}
	return redirect()->route('vehicle.index');
    }
}
