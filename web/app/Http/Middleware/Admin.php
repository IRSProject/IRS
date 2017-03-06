<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
	if(Auth::user()) {
	    $user = Auth::user();
	    if($user->role != 'admin') {
		abort(403);
	    }
	} else {
	    return redirect()->route('login');
	}

        return $next($request);
    }
}
