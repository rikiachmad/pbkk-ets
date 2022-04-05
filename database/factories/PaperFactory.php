<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaperFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'book_id' => Book::factory()->isPaper()->category_seq(),
            'doi' => $this->faker->unique()->bothify('10.####/??????')
        ];
    }
}
