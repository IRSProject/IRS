<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleCheck extends Model
{
    protected $fillable = [
	'plate_number','plate_code',
	'brand','model','production_year'
	,'color','chassis_number'
	,'engine_number','aquisition_date','type','operation_year'
    ];

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
