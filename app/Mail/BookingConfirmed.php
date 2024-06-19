<?php

namespace App\Mail;

use App\Models\Tour;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookingConfirmed extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;
    public $tour;

    /**
     * Create a new message instance.
     */
    public function __construct($booking)
    {
        $this->booking = $booking;
        $this->tour = Tour::where('idTour', $booking->idTour)->first();
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Booking Confirmed',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.booking_confirmed',
            with: [
                'bookingId' => $this->booking->idBooking,
                'customerName' => $this->booking->user->name,
                'nameTour' => $this->tour->name,
                'quantityTicket' => $this->booking->quantityTicket,	
                'startDay' => $this->tour->startDay,
                'endDay' => $this->tour->endDay,
                'tourCost' => $this->tour->cost,
                
                // Add more booking details as needed
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}