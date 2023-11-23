<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Image;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::factory(5)
            ->has(
                Book::factory(rand(2, 5))
                    ->has(Image::factory(rand(1, 3)))
                    ->has(Review::factory(5)->for(User::factory()))
            )
            ->create();
    }
}
