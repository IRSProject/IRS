<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Auth;

class Operator
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
	    if($user->role != 'operator') {
		abort(403);
	    }
	} else {
	    return redirect()->route('login');
	}

        return $next($request);
    }
}
