<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\Player;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PlayersTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Schema::disableForeignKeyConstraints();
		Game::truncate();
		DB::table('player_tournament')->truncate();
		Player::truncate();
		Player::factory()->count(20)->create();
		Schema::enableForeignKeyConstraints();
	}
}
