<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;

class AppointmentController extends Controller
{
    public function create() {
	return view('appointments.create');
    }

    public function store(Request $request) {
	Line::create($request->all());
    }

    public function edit(Line $appointments) {
	return view('appointments.edit', ['appointment' => $appointment]);
    }

    public function update(Request $request) {
	$appointment = appointment::find($request->id);
	$appointment->fill($request->all());
	$appointment->save();
	return back();
}
}
