<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserBlogController extends Controller
{
    public function index()
    {
        $now = Carbon::now();
        $bookings = Booking::with(['user', 'tour'])
                ->where('confirmation_status', 'confirmed')
                ->where('payment_status', 'paid')
                ->whereIn('idTour', function($query) use ($now) {
                    $query->select('idTour')
                          ->from('tbltour')
                          ->where('endDay', '<', $now);
                })
                ->get();
        return view('fe.blog.blog', compact('bookings'));
    }
}
