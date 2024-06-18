<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookingConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $tour;
    public $booking;
    public $serviceFee;
    public $totalPrice;
    

    /**
     * Create a new message instance.
     *
     * @param array $tourDetails
     */
    public function __construct($serviceFee, $totalPrice, $user, $tour, $booking)
    {
        $this->serviceFee = $serviceFee;
        $this->totalPrice = $totalPrice;
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
        return $this->subject('Booking Confirmation')
                    ->view('email.mailConfirmBooking');
    }
}
