<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookmarkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 10),
            'book_id' => $this->faker->numberBetween(1, 50),
            'page' => $this->faker->numberBetween(1, 100),
        ];
    }
}
