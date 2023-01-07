<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
	use HasFactory;

	protected $table = 'games';
	protected $guarded = [];

	public function tournament()
	{
		return $this->belongsTo(Tournament::class);
	}

	public function player1()
	{
		return $this->hasOne(Player::class, 'id', 'player_1_id');
	}

	public function player2()
	{
		return $this->hasOne(Player::class, 'id', 'player_2_id');
	}

	public function gameDestination1()
	{
		return $this->hasOne(Game::class, 'game_id_player_1', 'id');
	}

	public function gameDestination2()
	{
		return $this->hasOne(Game::class, 'game_id_player_2', 'id');
	}

	public function gameSource1()
	{
		return $this->belongsTo(Game::class, 'id', 'game_id_player_1');
	}

	public function gameSource2()
	{
		return $this->belongsTo(Game::class, 'id', 'game_id_player_2');
	}

	public function playGame()
	{
		$player1 = $this->player1;
		$player2 = $this->player2;

		$points1 = $player1->ability + $player1->luck;
		$points2 = $player2->ability + $player2->luck;

		if ('f' == $this->tournament->sex) {
			$points1 = $points1 + $player1->reaction_time;
			$points2 = $points2 + $player2->reaction_time;
		} else {
			$points1 = $points1 + $player1->streng + $player1->velocity;
			$points2 = $points2 + $player2->streng + $player2->velocity;
		}
		if ($points1 == $points2) {
			$points1 += 1;
		}
		$winner = $points1 > $points2 ? $player1 : $player2;
		$this->update([
			'score_player_1' => $points1,
			'score_player_2' => $points2,
		]);
		if ($nextGamePlayer1 = $this->gameDestination1) {
			$nextGamePlayer1->player_1_id = $winner->id;
			$nextGamePlayer1->save();
		}
		if ($nextGamePlayer2 = $this->gameDestination2) {
			$nextGamePlayer2->player_2_id = $winner->id;
			$nextGamePlayer2->save();
		}
		return $winner;
	}
}
