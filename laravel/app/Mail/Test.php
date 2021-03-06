<?php

namespace itsep\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Test extends Mailable
{
    use Queueable, SerializesModels;
    private $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message, $subject)
    {
       $this->message = $message;
       $this->subject($subject);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.test')->with(['text'=>$this->message]);
    }
}
