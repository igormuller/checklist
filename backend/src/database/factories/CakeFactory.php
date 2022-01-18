<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CakeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'     => $this->faker->sentence(3),
            'weight'   => $this->faker->numberBetween(1000, 5000),
            'value'    => $this->faker->randomFloat(80, 10, 1000),
            'quantity' => $this->faker->numberBetween(10, 100),
        ];
    }
}
