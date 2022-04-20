<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Statistic;

class StatisticFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Statistic::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'assists' => $this->faker->randomNumber,
            'games_played' => $this->faker->randomNumber,
            'goals_conceded' => $this->faker->randomNumber,
            'goals_scored' => $this->faker->randomNumber,
            'minutes_played' => $this->faker->randomNumber,
            'player_id' => \App\Models\Player::factory(),
            'red_cards' => $this->faker->randomNumber,
            'shots_missed' => $this->faker->randomNumber,
            'shots_taken' => $this->faker->randomNumber,
            'yellow_cards' => $this->faker->randomNumber,
        ];
    }
}
