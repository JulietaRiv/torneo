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
		Schema::create('players', function (Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->enum('sex', ['male', 'female']);
			$table->integer('ability');
			$table->integer('luck');
			$table->integer('velocity')->nullable();
			$table->integer('streng')->nullable();
			$table->integer('reaction_time')->nullable();
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
		Schema::dropIfExists('players');
	}
};
