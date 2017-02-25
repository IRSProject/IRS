<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Station;

class StationController extends Controller
{
    //
    public function index() {
	return view('stations.create');
    }

    public function store(Request $request) {
	Station::create($request->all());
    }
}
