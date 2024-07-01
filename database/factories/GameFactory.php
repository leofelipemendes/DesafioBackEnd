<?php

namespace Database\Factories;

use App\Models\Game;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Season>
 */
class GameFactory extends Factory
{
    protected $model = Game::class;

    public function definition()
    {
        return [
            'date' => $this->faker->date,
            'season' => $this->faker->year,
            'status' => $this->faker->randomElement(['Scheduled', 'In Progress', 'Completed']),
            'period' => $this->faker->numberBetween(1, 4),
            'time' => $this->faker->time,
            'postseason' => $this->faker->boolean,
            'home_team_score' => $this->faker->numberBetween(80, 120),
            'visitor_team_score' => $this->faker->numberBetween(80, 120),
        ];
    }
}
