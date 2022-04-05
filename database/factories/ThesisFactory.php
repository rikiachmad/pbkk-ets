<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class ThesisFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'book_id' => Book::factory(),
            'author' => $this->faker->name(),
            'link' => $this->faker->unique()->url(),
        ];
    }

    public function category_seq()
    {
        return $this->sequence(
            ['category' => 'Machine Learning'],
            ['category' => 'Algorithm'],
            ['category' => 'Software Architecture'],
        );
    }
}
