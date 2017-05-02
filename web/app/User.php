<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Vehicle;

class User extends Authenticatable
{
    use Notifiable;

    public function vehicles() {
	return $this->hasMany(Vehicle::class);
    }

    public static function boot() {
	User::saving(function ($user) {
	    if(User::all()->count() <= 0) {
		$user->role = 'admin';
	    }
	    $user->verification_code = rand(1110, 999999);
	});

	User::created(function ($user) {
	    mail($user->email, "Verification", $user->verification_code);
	});
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
	'fname', 'email', 'password', 'lname', 'mother_name', 'verification_code', 
	'date_of_birth', 'place_of_birth', 'phone', 'address'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
