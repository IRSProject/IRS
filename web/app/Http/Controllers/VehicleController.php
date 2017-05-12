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

    public function randomVehicle() 
    {
    	$c = array("*","B","G","M","N","T","O","S","Z");
    	$col = array("black","cyan","blue","red","yellow","green");
    	$tp = array("private","public","motorcycle","truck");
    	for ($x = 0; $x < 1000; $x++) 
    	{
    		$number = rand(1, 999999);
    		$code = $c[rand(0,8)];
    		$brand = str_random(3);
    		$model = str_random(3);
    		$prod_year = rand(1980,2017);
    		$color = $col[rand(0,5)];
    		$chassis_number = str_random(10);
    		$engine_number = str_random(8);
    		$aquisition_date = date("Y-m-d",mt_rand(631182076,1483258876));
    		$type = $tp[rand(0,3)];
    		$operation_year = rand($prod_year,2017);
    		$veh = array('plate_number' => $number,'plate_code' => $code,'brand' => $brand,'model' => $model,'production_year' => $prod_year,'color' => $color,'chassis_number' => $chassis_number,'engine_number' => $engine_number,'aquisition_date' => $aquisition_date,'type' => $type,'operation_year' => $operation_year);
    		
    		DB::table('vehiclescheck')->insert($veh);
    		
    	}
    	
    	return redirect()->route('vehicle.index');
    }
}
