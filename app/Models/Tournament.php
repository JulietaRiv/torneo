<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
	use HasFactory;

	protected $table = 'tournaments';
	protected $guarded = [];

	public function players()
	{
		return $this->belongsToMany(Player::class, 'player_tournament');
	}

	public function createFixture($ids = null, $round = null)
	{
		if (null == $round) {
			$round = 1;
			//get random players
			$ids = $this->players()->get(['players.id'])->pluck('id')->toArray();
			//set fields to store
			$field1 = 'player_1_id';
			$field2 = 'player_2_id';
		} else {
			$field1 = 'game_id_player_1';
			$field2 = 'game_id_player_2';
		}
		//count needed games per rounds
		$gamesPerRound = count($ids) / 2;
		$data = [];
		for ($x = 1; $x <= $gamesPerRound; $x++) {
			//choose the first 2 players/ games to create the next game
			$data[] = [
				'round'         => $round,
				$field1         => $ids[0],
				$field2         => $ids[1],
				'tournament_id' => $this->id,
			];
			//reset the array with available players/ games
			unset($ids[0], $ids[1]);
			$ids = array_values($ids);
		}
		Game::insert($data);
		if (count($data) > 1) {
			$gameIds = Game::select('id')->where('tournament_id', $this->id)->where('round', $round)->get()->pluck('id')->toArray();
			$this->createFixture($gameIds, $round + 1);
		}
	}

	public function playTournament()
	{
		$rounds = sqrt(count($this->players));
		for ($x = 1; $x <= round($rounds); $x++) {
			$games = Game::where('tournament_id', $this->id)->where('round', $x)->get();
			foreach ($games as $g => $game) {
				$winner = $game->playGame();
				if ($x == round($rounds) && $g == (count($games) - 1)) {
					$this->update([
						'winner_player_id' => $winner->id,
					]);
					return $winner;
				}
			}
		}
	}
}
