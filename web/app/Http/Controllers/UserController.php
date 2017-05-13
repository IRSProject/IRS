<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index() {
	return view('users.index', ['users' => user::paginate(20)]);
    }

    public function create() {
	return view('users.create');
    }

    public function store(Request $request) {
	User::create($request->all());

    $request->session()->flash('notif', 'Successfully Added!');

	return redirect()->route('user.index');
    }

    public function edit(user $user) {
	return view('users.edit', ['user' => $user]);

    }

    public function update(Request $request) {
	$user = User::find($request->id);
	$user->fill($request->all());
	$user->save();
  $request->session()->flash('notif', 'Successfully Edited!');
	return redirect()->route('user.index');
    }

    public function delete(Request $request) {
	$user = User::find($request->id);
	if($user) {
	    $user->delete();
	}
  $request->session()->flash('notifdeleted', 'Successfully Deleted!');
	return redirect()->route('user.index');
    }
}
