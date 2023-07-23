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
            'title' => fake()->title,
            'slug' => fake()->slug,
            'author' => fake()->name(),
            'description' => fake()->text(),
            'rating' => fake()->numberBetween(0, 100),
            'preview_image_url' => fake()->url,
            'main_image_url' => fake()->url,
        ];
    }
}
