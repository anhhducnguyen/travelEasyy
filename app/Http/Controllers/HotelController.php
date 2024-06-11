<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\hotelModel;
use Illuminate\Support\Facades\DB;

class HotelController extends Controller
{
    public function addHotel(){
        return view('admin.addHotel');
    }
    public function index()
    {
        $hotels = DB::table('tblHotel')->get();
        // dd($hotels);
        return view('admin.hotel', compact('hotels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'idHotel' => 'required|integer|unique:hotels,idHotel',
            'idAddress' => 'required|integer',
            'name' => 'required|string|max:255',
        ]);

        hotelModel::create($request->all());

        // return redirect()->route('hotels.index')->with('success', 'Hotel added successfully.');
        return redirect()->route('index');
    }
    public function update(){
        
    }
    public function del(){

    }

    
}
