<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Line;

class LineController extends Controller
{
     public function create() {
	return view('lines.create');
    }

    public function store(Request $request) {
	Line::create($request->all());
    }

    public function edit(Line $lines) {
	return view('lines.edit', ['line' => $line]);
    }

    public function update(Request $request) {
	$line = Line::find($request->id);
	$line->fill($request->all());
	$line->save();
	return back();
}
}
