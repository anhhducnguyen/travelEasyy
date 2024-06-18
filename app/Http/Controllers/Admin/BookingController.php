<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\BookingConfirmed;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::all();

        return view('admin.bookings.index', compact('bookings'));
    }

    // public function confirm(Request $request, $id)
    // {
    //     $booking = Booking::findOrFail($id);

    //     // Update trạng thái
    //     $booking->confirmation_status = 'confirmed';
    //     $booking->save();
        

    //     return redirect()->back()->with('success', 'Booking confirmed successfully.');
    // }
    public function confirm(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        // Tìm người dùng liên quan đến booking
        $user = $booking->user;

        if ($user && !empty($user->email)) {
            // Update trạng thái
            $booking->confirmation_status = 'confirmed';
            $booking->save();

            // Gửi email xác nhận
            Mail::to($user->email)->send(new BookingConfirmed($booking));

            return redirect()->back()->with('success', 'Booking confirmed successfully and email sent.');
        } else {
            return redirect()->back()->with('error', 'Booking confirmed but customer email is missing.');
        }
    }
    public function pay(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        // Update trạng thái
        $booking->payment_status = 'paid';
        $booking->save();

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
