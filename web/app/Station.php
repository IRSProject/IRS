<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    protected $fillable = ['name', 'address'];

    public function lines() {
	return $this->hasMany(Line::class);
    }

}
