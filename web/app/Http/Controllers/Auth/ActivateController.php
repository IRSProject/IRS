<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ActivateController extends Controller
{
    /**
     * Where to redirect users after confirmation.
     *
     * @var string
     */
    protected $redirectTo = '/vehicle/create';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    
}
