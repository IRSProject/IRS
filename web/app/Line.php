<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Line extends Model
{
    protected $fillable = ['number', 'station_id', 'line_id'];

    public function station() {
	return $this->belongsTo(Station::class);
    }
}
