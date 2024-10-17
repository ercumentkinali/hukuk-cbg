<?php

namespace Database\Seeders;

use App\Models\Book;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Author;
use App\Models\Genre;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
{
    Genre::factory()->count(5)->create();
    Author::factory(10)->create()->each(function ($author) {
        Book::factory(3)->create([
            'author_id' => $author->id,
            'genre_id' => Genre::inRandomOrder()->first()->id
    ]);
    });
}
}
