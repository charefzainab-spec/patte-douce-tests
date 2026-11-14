<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class AnimalFactory extends Factory
{
    public function definition(): array
    {
        return [
            'titre' => fake()->sentence(3),
            'description' => fake()->paragraph(),
            'age' => fake()->numberBetween(0, 15),
            'race' => fake()->word(),
            'photo' => null,
            'statut' => 'adoption',
            'user_id' => User::factory(),
            'tel' => fake()->numerify('########'),
        ];
    }
}