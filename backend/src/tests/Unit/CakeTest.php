<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CakeTest extends TestCase
{
    use WithFaker;

    public function testCreateCake() : void
    {
        $cakeName = $this->faker()->unique()->word;

        $cake = (new \App\Services\CakeService)->create(
            [
                'name'     => $cakeName,
                'weight'   => 100,
                'quantity' => 5,
                'value'    => 50,
            ]
        );

        $response = $this->json('GET', route('cakes.index'), []);

        $response->assertStatus(200)
                 ->assertJsonStructure(['data',])
                 ->assertJsonFragment(
                     [
                         'id'       => $cake->id,
                         'name'     => $cakeName,
                         'quantity' => 5,
                         'value'    => "50.00",
                         'weight'   => "100",
                     ]
                 );
    }
}
