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
		Schema::table('games', function (Blueprint $table) {
			$table->foreignId('game_id_player_1')->references('id')->on('games')->nullable();
			$table->foreignId('game_id_player_2')->references('id')->on('games')->nullable();
			$table->integer('round');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('games', function (Blueprint $table) {
			$table->dropColumn('game_id_player_1');
			$table->dropColumn('game_id_player_2');
			$table->dropColumn('round');
		});
	}
};
