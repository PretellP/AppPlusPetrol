<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificationApproverMail extends Mailable
{
    use Queueable, SerializesModels;
    public $guide;

    public function __construct($guide)
    {
        $this->guide = $guide;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('(no-reply) Solicitud de aprobación')->markdown('emails.notficationApprover');
    }
}
