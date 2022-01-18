<?php

namespace App\Services;

use App\Jobs\SendEmailJob;
use App\Models\Interested;

class InterestedService
{
    public function all()
    {
        return Interested::all();
    }

    public function create(array $data) : Interested
    {
        $interested = Interested::create($data);
        if ($interested->cake->quantity > 0) {
            SendEmailJob::dispatch($interested)->onConnection('database')->onQueue('email');
        }

        return $interested;
    }

    public function update(array $data, Interested $interested) : Interested
    {
        $interested->update($data);
        return $interested;
    }
}
