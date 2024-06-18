<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tour;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Booking;

class HomeAdminController extends Controller
{
    public function dashboard(){
        $userCount = User::where('role','user')->count(); // Lấy số lượng người dùng
        $tourCount = Tour::count(); // Lấy số lượng tour

        $bookCount = Booking::count(); // Lấy số lượng booking
        $totalSale = 0;   // Tính tổng sale từ các tour đã expired
        $tours = Tour::all(); // Lấy tất cả các tour

        foreach ($tours as $tour) {
            $totalSale += $tour->getTotalCostExpired();
        }
        return view('admin.index', compact('userCount', 'tourCount', 'bookCount', 'totalSale'));
    }
}
