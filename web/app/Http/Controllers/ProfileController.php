<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;

class ProfileController extends Controller
{
    public function index() {
	return view('profile.index');
    }

    public function store(Request $request) {
	Profile::create($request->all());

    $request->session()->flash('notif', 'Successfully Added!');

	return redirect()->route('profile.index');
    }

    public function edit(profile $profile) {
	return view('profile.edit', ['profile' => $profile]);
    }

    public function update(Request $request) {
	$profile = Profile::find($request->id);
	$profile->fill($request->all());
	$profile->save();
  $request->session()->flash('notif', 'Successfully Edited!');
	return redirect()->route('profile.index');
    }
}