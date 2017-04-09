<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Line;
use App\Station;
use Auth;

class Appointment extends Model
{
    protected $fillable = [  'title' , 'start', 'end' , 'resourceId', 'vehicle_id', 'user_id'];
    protected $dates = ['created_at', 'updated_at', 'start', 'end'];

    public static function boot() {
	Appointment::saving(function ($appointment) {
	    $appointment->user_id = Auth::user()->id;
	});
    }

    public function line() {
	return $this->belongsTo(Line::class);
    }
}
