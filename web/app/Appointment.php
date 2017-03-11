<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [ 'date' , 'time' , 'station_id' , 'line_id'];
}
