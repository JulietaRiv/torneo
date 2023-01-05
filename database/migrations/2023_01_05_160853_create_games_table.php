<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('games', function (Blueprint $table) {
			$table->id();
			$table->foreignId('player_1_id')->references('id')->on('players')->nullable();
			$table->foreignId('player_2_id')->references('id')->on('players')->nullable();
			$table->foreignId('tournament_id')->references('id')->on('tournaments');
			$table->integer('score_player_1')->nullable();
			$table->integer('score_player_2')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('games');
	}
};
