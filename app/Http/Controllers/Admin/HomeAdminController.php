<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tour;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class HomeAdminController extends Controller
{
    public function dashboard(){
        $userCount = User::count(); // Lấy số lượng người dùng
        $tourCount = Tour::count(); // Lấy số lượng tour
        // $bookCount = Book::count(); // Lấy số lượng booking
        // $sale =                     //Tính sale
        return view('admin.index', compact('userCount','tourCount')); 
    }
}
