<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AppointmentDetail extends Mailable
{
    use Queueable, SerializesModels;

    public $appointment;    

    public function __construct($appointment)
    {
        $this->appointment = $appointment;                    
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.appointment');
    }
}
