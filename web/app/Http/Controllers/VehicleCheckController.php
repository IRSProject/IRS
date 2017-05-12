<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VehicleCheck;
use Auth;

class VehicleCheckController extends Controller
{
    public function store(Request $request) {
	$vehicle = VehicleCheck::create($request->all());
  $this->validate($request, ['plate_number' => 'required', 'plate_code' => 'required', 'brand' => 'required'
                            , 'model' => 'required', 'production_year' => 'required', 'color' => 'required'
                            , 'chassis_number' => 'required', 'engine_number' => 'required', 'aquisition_date' => 'required'
                            , 'type' => 'required', 'operation_year' => 'required']);
	return redirect()->route('vehicle.index');
    }

    public static function randomVehicle()
    {
    	$c = array("*","B","G","M","N","T","O","S","Z");
    	$col = array("black","cyan","blue","red","yellow","green");
    	$tp = array("private","public","motorcycle","truck");
    	for ($x = 0; $x < 1000; $x++) 
    	{
    		$veh = new VehicleCheck;

    		$veh->plate_number = rand(1, 999999);
    		$veh->plate_code = $c[rand(0,8)];
    		$veh->brand = str_random(3);
    		$veh->model = str_random(3);
    		$prod_year = rand(1980,2017);
    		$veh->production_year = $prod_year;
    		$veh->color = $col[rand(0,5)];
    		$veh->chassis_number = str_random(10);
    		$veh->engine_number = str_random(8);
    		$veh->aquisition_date = date("Y-m-d",mt_rand(631182076,1483258876));
    		$veh->type = $tp[rand(0,3)];
    		$veh->operation_year = rand($prod_year,2017);

    		$veh->save();	
    	}
    	
    	return redirect()->route('vehicle.index');
    }
}
