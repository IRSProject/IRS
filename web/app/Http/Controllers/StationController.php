<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Station;

class StationController extends Controller
{
    public function create() {
	return view('stations.create');
    }

    public function store(Request $request) {
	Station::create($request->all());
    }

    public function edit(Station $station) {
	return view('stations.edit', ['station' => $station]);
    }

    public function update(Request $request) {
	$station = Station::find($request->id);
	$station->fill($request->all());
	$station->save();
	return back();
    }
}
