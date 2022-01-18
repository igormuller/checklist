<?php

namespace App\Services;

use App\Jobs\SendEmailJob;
use App\Models\Cake;

class CakeService
{
    public function all()
    {
        return Cake::all();
    }

    public function create(array $data) : Cake
    {
        return Cake::create($data);
    }

    public function update(array $data, Cake $cake) : Cake
    {
        $cake->update($data);
        if ($cake->quantity > 0) {
            $interested = $cake->interested->where('send', 0);
            foreach ($interested as $interest) {
                SendEmailJob::dispatch($interest)->onConnection('database')->onQueue('email');
            }
        }
        return $cake;
    }
}
