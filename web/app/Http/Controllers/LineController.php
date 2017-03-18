<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Line;

class LineController extends Controller
{
    public function index() {
	return view('lines.index', ['lines' => Line::paginate(20)]);
    }
    public function stations(Line $station) {
	return view('stations.index', ['stations' => $line->stations]);
    }
    public function create() {
	return view('lines.create');
    }

    public function store(Request $request) {
	Line::create($request->all());
	return redirect()->route('line.index');
    }

    public function edit(Line $line) {
	return view('lines.edit', ['line' => $line]);
    }

    public function update(Request $request) {
	$line = Line::find($request->id);
	$line->fill($request->all());
	$line->save();
	return redirect()->route('line.index');
    }

    public function delete(Request $request) {
	$line = Line::find($request->id);
	if($line) {
	    $line->delete();
	}
	return redirect()->route('line.index');
    }
}
