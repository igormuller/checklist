<?php

namespace Tests\Unit;

use App\Models\Cake;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InterestedTest extends TestCase
{
    use WithFaker;

    public function testCreateInterested() : void
    {
        $interestedName = $this->faker()->unique()->word;
        $interestedEmail = $this->faker()->email();
        $interestedCakeId = Cake::all()->random();

        $interested = (new \App\Services\InterestedService)->create(
            [
                'cake_id' => $interestedCakeId,
                'name'    => $interestedName,
                'email'   => $interestedEmail,
            ]
        );

        $response = $this->json('GET', route('interested.index'), []);

        $response->assertStatus(200)
                 ->assertJsonStructure(['data',])
                 ->assertJsonFragment(
                     [
                         'id'      => $interested->id,
                         'cake_id' => $interestedCakeId,
                         'name'    => $interestedName,
                         'email'   => $interestedEmail,
                     ]
                 );
    }
}
