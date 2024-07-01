<?php

namespace Database\Factories;

use App\Models\Player;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
{
    protected $model = Player::class;

    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'position' => $this->faker->randomElement(['G', 'F', 'C']),
            'height' => $this->faker->randomElement(['6-0', '6-1', '6-2', '6-3', '6-4', '6-5', '6-6', '6-7', '6-8', '6-9', '6-10', '6-11', '7-0']),
            'weight' => $this->faker->numberBetween(180, 260),
            'jersey_number' => $this->faker->numberBetween(0, 99),
            'college' => $this->faker->optional()->company,
            'country' => $this->faker->country,
            'draft_year' => $this->faker->year,
            'draft_round' => $this->faker->numberBetween(1, 2),
            'draft_number' => $this->faker->numberBetween(1, 60),
        ];
    }
}
