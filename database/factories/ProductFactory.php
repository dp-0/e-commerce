<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'photo' => fake()->imageUrl(),
            'name' => fake()->name,
            'type' => fake()->word,
            'price' => fake()->randomFloat(2, 10, 100),
            'url' => fake()->url,
            'description' => fake()->sentence,
            'status' => fake()->randomElement(['available', 'expired']),
        ];
    }
}
