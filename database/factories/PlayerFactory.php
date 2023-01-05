<?php

namespace Database\Factories;

use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition()
	{
		$faker = Faker::create();
		return [
			'name'          => $faker->name,
			'sex'           => $faker->randomElement(['male', 'female']),
			'ability'       => $faker->numberBetween(0, 100),
			'luck'          => $faker->numberBetween(0, 100),
			'velocity'      => $faker->numberBetween(0, 100),
			'streng'        => $faker->numberBetween(0, 100),
			'reaction_time' => $faker->numberBetween(0, 100),
		];
	}
}
