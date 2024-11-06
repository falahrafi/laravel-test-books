<?php

namespace Database\Factories;

use App\Models\Author;
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
            'title' => ucwords(rtrim(fake()->realText($maxNbChars = 20, $indexSize = 1), '.')),
            'serial_number' => fake()->isbn10(),
            'published_at' => fake()->date(),
            'author_id' => Author::factory(),
        ];
    }
}
