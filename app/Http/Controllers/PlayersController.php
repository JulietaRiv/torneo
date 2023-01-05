<?php

namespace App\Http\Controllers;

use App\Models\Player;

class PlayersController extends Controller
{
	public function index()
	{
		return view('players.index', ['players' => Player::all()]);
	}

	public function form()
	{
		return view('players.form');
	}
}
