<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Genre;
use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition()
    {
        $genre_id = Genre::inRandomOrder()->first()->name;

        return [
            'name' => $this->faker->sentence(3),
            'room' => $this->faker->word,
            'shelf' => $this->faker->randomDigitNotNull,
            'row' => $this->faker->randomDigitNotNull,
            'genre_id' => $genre_id,
            'publish_date' => $this->faker->date(),
            'author_id' => Author::factory(),
        ];
    }
}
