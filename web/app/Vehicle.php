<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vehicle extends Model
{
    protected $fillable = [ 'plate_number','plate_code','brand','model','production_year','color','chassis_number'
				,'engine_number','aquisition_date','type','operation_year'
 ];
}
