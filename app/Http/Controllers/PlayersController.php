<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

	public function store(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'name'            => 'required',
			'sex'             => 'required',
			'ability'         => 'required|numeric|min:0|max:100',
			'luck'            => 'required|numeric|min:0|max:100',
			'velocity'        => 'sometimes|exclude_unless:sex,male|required|numeric|min:0|max:100',
			'streng'          => 'sometimes|exclude_unless:sex,male|required|numeric|min:0|max:100',
			'reaction_time'   => 'sometimes|exclude_unless:sex,female|required|numeric|min:0|max:100',
		]);
		if ($validator->fails()) {
			return redirect()->back()
				->withErrors($validator)
				->withInput();
		} else {
			Player::create([
				'name'            => $request->name,
				'sex'             => $request->sex,
				'ability'         => $request->ability,
				'luck'            => $request->luck,
				'velocity'        => $request->velocity ?? 0,
				'streng'          => $request->streng ?? 0,
				'reaction_time'   => $request->reaction_time ?? 0,
			]);
			return redirect()->route('players')->with('success, player was stored successfully');
		}
	}
}
