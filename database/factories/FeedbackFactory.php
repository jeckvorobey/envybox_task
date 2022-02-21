<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FeedbackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'uname' => $this->faker->name,
            'phone' => $this->faker->e164PhoneNumber,
            'msg' => $this->faker->paragraph
        ];
    }
}
