<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $tour;
    public $booking;

    /**
     * Create a new message instance.
     */
    public function __construct($user, $tour, $booking)
    {
        $this->user = $user;
        $this->tour = $tour;
        $this->booking = $booking;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.adminConfirmation')
                    ->subject('Booking Confirmation by Admin');
    }
}
