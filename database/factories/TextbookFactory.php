<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class TextbookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'book_id' => Book::factory()->isTextbook()->category_seq(),
            'isbn' => $this->faker->unique()->numerify('###-#-##-######-#'),
            'edition' => $this->faker->randomDigit(),
        ];
        
    }
}
