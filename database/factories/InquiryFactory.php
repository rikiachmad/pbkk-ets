<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class InquiryFactory extends Factory
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
            'text' => $this->faker->text(),
        ];
    }

    public function type_sequence()
    {
        return $this->sequence(
            ['type' => 'complaint'],
            ['type' => 'request'],
        );
    }
}
