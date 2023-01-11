<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Tournament;

class TournamentsController extends Controller
{
	public function tournament(Tournament $tournament = null)
	{
		$tournament = null == $tournament ? Tournament::find(1) : $tournament;
		$games = Game::where('tournament_id', $tournament->id)->orderBy('round')->orderBy('id')->get();
		$rounds = $games->last()->round;
		$levelTotal = ($rounds * 2) - 1;

		for ($x = 1; $x <= $rounds; $x++) {
			$gamesPerRound = $games->where('round', $x);
			if ($x != $rounds) {
				$levelLeft = $x;
				$levelRight = $levelTotal - $x + 1;
				$quantityPerLevel = count($gamesPerRound) / 2;
				$levels[$levelLeft] = $gamesPerRound->slice(0, $quantityPerLevel);
				$levels[$levelRight] = $gamesPerRound->slice($quantityPerLevel);
			} else {
				$levels[$x] = $gamesPerRound;
			}
		};
		ksort($levels);

		return view('tournaments/tournament', ['tournaments' => Tournament::all(), 'levels' => $levels, 'tournamentId' => $tournament->id]);
	}

	public function playTournament(Tournament $tournament)
	{
		$tournament->playTournament();
		return redirect()->route('tournament', [$tournament->id]);
	}
}
