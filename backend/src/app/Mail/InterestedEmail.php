<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InterestedEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $interested;

    public function __construct($data)
    {
        $this->interested = $data;
    }

    public function build()
    {
        return $this->view('emails.interested');
    }
}
