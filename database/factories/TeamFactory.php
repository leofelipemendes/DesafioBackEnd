<?php

namespace Database\Factories;

use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Team>
 */
class TeamFactory extends Factory
{
    protected $model = Team::class;

    public function definition()
    {
        return [
            'conference' => $this->faker->word,
            'division' => $this->faker->word,
            'city' => $this->faker->city,
            'name' => $this->faker->word,
            'full_name' => $this->faker->company,
            'abbreviation' => strtoupper($this->faker->lexify('???')),
        ];
    }
}
