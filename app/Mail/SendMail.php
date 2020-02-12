<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
/*     public function __construct($feedback)
    {
        //
        $this->feedback = $feedback;
    } */

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('signup')->to('bpvijay97@gmail.com');
    }
}
