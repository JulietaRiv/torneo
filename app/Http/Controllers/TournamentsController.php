<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Tournament;

class TournamentsController extends Controller
{
	public function tournament()
	{
		$games = Game::where('tournament_id', 1)->orderBy('round')->orderBy('id')->get();
		//dd($games);
		$rounds = $games->last()->round;
		$levelTotal = ($rounds * 2) - 1;
		for ($x = 0; $x < $rounds; $x++) {
			$gamesPerRound = $games->where('round', $x + 1)->toArray();
			if ($x != $rounds - 1) {
				$levelLeft = $x;
				$levelRight = $levelTotal - $x;
				$quantityPerLevel = count($gamesPerRound) / 2;
				$levels[$levelLeft] = array_slice($gamesPerRound, 0, $quantityPerLevel);
				$levels[$levelRight] = array_slice($gamesPerRound, $quantityPerLevel);
			} else {
				$levels[$x] = $gamesPerRound;
			}
		};
		ksort($levels);
		dd($levels);
		$games1 = [
			[
				[
					'game_id'    => 1,
					'player_1'   => 'boca',
					'player_2'   => 'river',
					'score_1'    => '',
					'score_2'    => '',
				],
				[
					'player_1' => 'nnn',
					'player_2' => 'xxxxx',
				],
			],

			[
				[
					'player_1' => 'boca',
					'player_2' => 'xxxx',
				],
			],

			[
				[
					'player_1' => 'boca',
					'player_2' => 'wwww',
				],
			],

			[
				[
					'player_1' => 'wwww',
					'player_2' => 'ttttt',
				],
			],

			[
				[
					'player_1' => 'qqq',
					'player_2' => 'wwwww',
				],
				[
					'player_1' => 'rrrrr',
					'player_2' => 'tttttt',
				],
			],
		];

		return view('tournaments/tournament', ['tournaments' => Tournament::all(), 'levels' => $levels]);
	}
}
