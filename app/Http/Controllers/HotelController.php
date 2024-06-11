<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\hotelModel;
use Illuminate\Support\Facades\DB;

class HotelController extends Controller
{
    public function index()
    {
        $hotels = DB::table('tblHotel')->get();
        // dd($hotels);
        return view('fe.hotel', compact('hotels'));
    }


    public function insert(){
        
    }
    public function update(){
        
    }
    public function del(){

    }

    
}
