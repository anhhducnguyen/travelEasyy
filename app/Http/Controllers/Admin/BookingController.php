<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\AdminConfirmation;
use App\Mail\PaymentConfirmatiom;
use App\Models\Booking;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::all();

        return view('admin.bookings.index', compact('bookings'));
    }


    public function confirm(Request $request, $id)
    {
        try{
            $booking = Booking::findOrFail($id);

            $booking->confirmation_status = 'confirmed';
            $booking->save();

            $booking->load('user', 'tour');

            Mail::to($booking->user->email)->send(new AdminConfirmation($booking->user, $booking->tour, $booking));
            return redirect()->back()->with('success', 'Booking confirmed successfully.');
        
        } catch(Exception $e) {
            return redirect()->back()->with('error', 'The booking was not confirmed because your email was missing.');
        }
    }
    public function pay(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        $booking->payment_status = 'paid';
        $booking->save();
        
        Mail::to($booking->user->email)->send(new PaymentConfirmatiom($booking));

        return redirect()->back()->with('success', 'Booking payment confirmed successfully.');
    }
    public function show(Booking $booking)
    {
        // Load thông tin user và tour tương ứng với booking
        $booking->load('user', 'tour');

        return view('admin.bookings.show', compact('booking'));
    }
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();
        return redirect()->route('admin.bookings.index')->with('success', 'Booking deleted successfully.');
    }
}
