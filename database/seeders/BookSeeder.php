<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Image;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::factory(5)
            ->has(Image::factory(rand(1, 3)))
            ->create();
    }
}
