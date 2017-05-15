<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicle;
use App\Vehiclecheck;
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
	$vehiclecheck = Vehiclecheck::where('plate_number', $request->plate_number)
	    ->where('plate_code', $request->plate_code)
	    ->where('brand', $request->brand)
	    ->where('model', $request->model)
      ->where('production_year', $request->production_year)
      ->where('color', $request->color)
      ->where('chassis_number', $request->chassis_number)
      ->where('engine_number', $request->engine_number)
      ->where('aquisition_date', $request->aquisition_date)
      ->where('type', $request->type)
      ->where('operation_year', $request->operation_year)->get();

	if(count($vehiclecheck->toArray()) <= 0) {
	    abort(403);
	}
	$this->validate($request, ['plate_number' => 'required', 'plate_code' => 'required', 'brand' => 'required'
                            , 'model' => 'required', 'production_year' => 'required', 'color' => 'required'
                            , 'chassis_number' => 'required', 'engine_number' => 'required', 'aquisition_date' => 'required'
                            , 'type' => 'required', 'operation_year' => 'required']);

	$vehicle = Vehicle::create($request->all());
	$request->session()->flash('notif', 'Successfully Added!');
	return redirect()->route('vehicle.index');
    }



    public function edit(Vehicle $vehicle) {

	return view('vehicles.edit', ['vehicle' => $vehicle]);
    }

    public function update(Request $request) {
	$vehicle = Vehicle::find($request->id);
	$vehicle->fill($request->all());
	$vehicle->save();
          $request->session()->flash('notif', 'Successfully Edited!');
	return redirect()->route('vehicle.index');
    }

    public function delete(Request $request) {
	$vehicle = Vehicle::find($request->id);
	if($vehicle) {
	    $vehicle->delete();
	}
    $request->session()->flash('notifdeleted', 'Successfully Deleted!');
	return redirect()->route('vehicle.index');
    }

    public function allveh(Vehicle $vehicle) {
  return view('vehicles.allveh', ['vehicle' => $vehicle]);
    }
}
