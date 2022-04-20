<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\FixtureResult;

class FixtureResultFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FixtureResult::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'assists' => $this->faker->randomNumber,
            'fixture_id' => \App\Models\Fixture::factory(),
            'goals_scored' => $this->faker->randomNumber,
            'player_id' => \App\Models\Player::factory(),
            'red_cards' => $this->faker->randomNumber,
            'yellow_cards' => $this->faker->randomNumber,
        ];
    }
}
