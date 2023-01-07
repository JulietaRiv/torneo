<?php

namespace Database\Seeders;

use App\Models\Player;
use App\Models\Tournament;
use Illuminate\Database\Seeder;

class TournamentTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$tournament1 = Tournament::create(['id'  => 1,	'sex' => 'f']);
		$females = Player::where('sex', 'female')->limit(8)->get();
		$tournament1->players()->attach($females);
		$tournament1->createFixture();

		$tournament2 = Tournament::create(['id'  => 2,	'sex' => 'm']);
		$males = Player::where('sex', 'male')->limit(8)->get();
		$tournament2->players()->attach($males);
		$tournament2->createFixture();
	}
}
