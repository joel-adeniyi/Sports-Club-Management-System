<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Player;

class PlayerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Player::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'alliance_id' => \App\Models\Alliance::factory(),
            'contract_id' => \App\Models\Contracts::factory(),
            'player_position_id' => \App\Models\PlayerPosition::factory(),
            'squad_id' => \App\Models\Squad::factory(),
            'team_id' => \App\Models\Teams::factory(),
        ];
    }
}
