<?php

namespace App\Http\Controllers\Clients;

use Auth;
use App\Http\Controllers\Controller;

class ClientsController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}

	public function index() {
		return view('client.home', ['user' => Auth::user()]);
	}

	public function create() {
		return view('client.create', ['user' => Auth::user()]);
	}

	public function show($id) {
		return view('client.show', ['user' => Auth::user()]);
	}

	public function update($id) {
		return view('client.update', ['user' => Auth::user()]);
	}

	public function edit($id) {
		return view('client.edit', ['user' => Auth::user()]);
	}

	public function destroy($id) {
		return view('client.edit', ['user' => Auth::user()]);
	}

}