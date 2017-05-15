<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Profile;

class ProfileController extends Controller
{
    public function store(Request $request) {
	User::create($request->all());

    $request->session()->flash('notif', 'Successfully Added!');

	return redirect()->route('home');
    }

    public function edit(user $user) {
	return view('profile.edit', ['user' => $user]);
    }

    public function update(Request $request) {
	$user = User::find($request->id);
	$user->fill($request->all());
	$user->save();
  $request->session()->flash('notif', 'Successfully Edited!');
	return redirect()->route('home');
    }
}
