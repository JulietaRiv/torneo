<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlayersRequest;
use App\Models\Player;

class PlayersController extends Controller
{
	public function index()
	{
		return view('players.index', ['players' => Player::all()]);
	}

	public function form(Player $player = null)
	{
		return view('players.form', ['player' => $player]);
	}

	public function store(PlayersRequest $request)
	{
		Player::create([
			'name'            => $request->name,
			'sex'             => $request->sex,
			'ability'         => $request->ability,
			'luck'            => $request->luck,
			'velocity'        => $request->velocity ?? 0,
			'streng'          => $request->streng ?? 0,
			'reaction_time'   => $request->reaction_time ?? 0,
		]);
		return redirect()->route('players')->with('success, Player was stored successfully');
	}

	public function destroy(Player $player)
	{
		$player->delete();
		return redirect()->route('players')->with('success', 'Player deleted successfully');
	}
}
