<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Vehicle extends Controller
{
    public function index() {
	return view('vehicles.create');
    }

    public function store(Request $request) {
	Vehicle::create($request->all());
    }
}
