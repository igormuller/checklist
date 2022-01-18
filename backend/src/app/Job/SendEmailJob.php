<?php

namespace App\Jobs;

use App\Mail\InterestedEmail;
use App\Models\Interested;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $interested;

    public function __construct(Interested $interested)
    {
        $this->interested = $interested;
    }

    public function handle()
    {
        Mail::to($this->interested->email)->send(new InterestedEmail($this->interested));
        $this->interested->send = true;
        $this->interested->save();
        Log::info("Email send to interested: ".json_encode($this->interested));
    }
}
