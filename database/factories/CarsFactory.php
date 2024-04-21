<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CarsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company' => fake()->company(),
            'model' => fake()->word(),
            'price' => fake()->numberBetween(1000, 200000),
            'image' => fake()->imageUrl(640, 480, 'car', true),
            'user_id' => fake()->numberBetween(1, 10),
            'year' => fake()->numberBetween(1990, 2024),
            'details' => fake()->paragraph(5),
        ];
    }
}
