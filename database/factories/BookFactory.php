<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle(),
            'description' => fake()->text(200),
            'cover_url' => fake()->imageUrl(),
            'price' => fake()->numberBetween(100, 20000),
            'quantity' => fake()->numberBetween(0, 50),
        ];
    }
}
