<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(),
            'slug' => $this->faker->slug(),
            'author' => $this->faker->name(),
            'publisher' => $this->faker->company(),
            'year_published' => $this->faker->year(),
            'description' => $this->faker->text(),
        ];
    }

    public function isMagazine()
    {
        return $this->state(function (array $attributes) {
            return [
                'book_type' => 'magazine',
                'link' => 'src/' . $this->faker->unique()->numerify('magazine-#####') . '.pdf',
            ];
        });
    }

    public function isTextbook()
    {
        return $this->state(function (array $attributes) {
            return [
                'book_type' => 'textbook',
                'link' => 'src/' . $this->faker->unique()->numerify('textbook-#####') . '.pdf',
            ];
        });
    }

    public function isPaper()
    {
        return $this->state(function (array $attributes) {
            return [
                'book_type' => 'paper',
                'link' => 'src/' . $this->faker->unique()->numerify('paper-#####') . '.pdf',
            ];
        });
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
