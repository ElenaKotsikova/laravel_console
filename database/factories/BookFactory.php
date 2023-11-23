<?php

namespace Database\Factories;

use App\Enums\BookStatus;
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
            'title' => fake()->sentence(rand(1, 3)),
            'page_number' => rand(10, 300),
            'annotation' => fake()->realText(),
            'author_id' => Author::factory(),
            'status' => fake()->randomElement([BookStatus::Draft, BookStatus::Published]),
        ];
    }
}
