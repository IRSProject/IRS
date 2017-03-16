<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Vehicle extends Model
{
    protected $fillable = [
	'plate_number','plate_code',
	'brand','model','production_year'
	,'color','chassis_number'
	,'engine_number','aquisition_date','type','operation_year'
    ];

    public static function boot() {
	Vehicle::saving(function ($vehicle) {
	    $user_id = null;
	    if(Auth::check()) {
		$user_id = Auth::user()->id;
		$vehicle->user_id = $user_id;
	    }
	});
    }
}
