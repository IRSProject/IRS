<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Line;
use App\Station;
use Auth;

class Appointment extends Model
{
    protected $fillable = [ 'date' , 'start_time', 'end_time' , 'line_id', 'vehicle_id', 'user_id'];

    public static function boot() {
	Appointment::saving(function ($appointment) {
	    $appointment->user_id = Auth::user()->id;
	});
    }
    
    public function line() {
	return $this->belongsTo(Line::class);
    }
}
