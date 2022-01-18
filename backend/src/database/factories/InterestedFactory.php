<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class InterestedFactory extends Factory
{
    public function definition()
    {
        return [
            'cake_id' => \App\Models\Cake::all()->random(),
            'name'    => $this->faker->sentence(3),
            'email'   => $this->faker->email(),
        ];
    }
}

