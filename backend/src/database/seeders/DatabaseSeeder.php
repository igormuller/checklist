<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        \App\Models\User::factory(1)->create();
        \App\Models\Cake::factory(4)->create();
        \App\Models\Interested::factory(4)->create();

    }
}
