<?php

namespace App\Http\Controllers\User;

use App\Helpers\IdGenerator;
use App\Http\Controllers\Controller;
use App\Mail\BookingConfirmation;
use App\Models\Booking;
use App\Models\Tour;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class CheckoutController extends Controller
{
    public function storeSession(Request $request)
    {
        $request->session()->put('tourId', $request->input('tourId'));
        $request->session()->put('guestCount', $request->input('guestCount'));
        $request->session()->put('serviceFee', $request->input('serviceFee'));
        $request->session()->put('totalPrice', $request->input('totalPrice'));

        return redirect()->route('checkout.show', ['tourId' => $request->input('tourId')]);
    }
    public function show($tourId, Request $request)
    {
        $user = Auth::user();
        $address = $user->address;
        $tour = Tour::findOrFail($tourId);
        $guestCount = $request->session()->get('guestCount', 1);
        $serviceFee = $request->session()->get('serviceFee', 3);
        $totalPrice = $request->session()->get('totalPrice', $tour->cost * $guestCount + $serviceFee);

        return view('fe.checkoutDetails.checkout', compact('tour', 'address', 'user','serviceFee', 'guestCount', 'totalPrice'));
    }
    public function confirmBooking(Request $request)
    {
        $user = Auth::user();

        try{
            $data = $request->validate([
                'tourId' => 'required|string|max:15',
                'serviceFee'=>'string',
                'quantityTicket' => 'required|min:1',
                'totalPrice' => 'required',
            ]);
    
            $newId = IdGenerator::generateId('BK', Booking::class, 'idBooking');   
    
            $booking = Booking::create([
                'idBooking' => $newId,
                'idTour'=> $data['tourId'],
                'idUser' => $user->id,
                'quantityTicket' => $data['quantityTicket'],
            ]);
            
            $tour = Tour::find($data['tourId']);

            Mail::to($request->user()->email)->send(new BookingConfirmation($data['serviceFee'], $data['totalPrice'], $user, $tour, $booking));

            return redirect()->back()->with('success', 'Booking created successfully.');
        }catch(Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }


        
    }
}
