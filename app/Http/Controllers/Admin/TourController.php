<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use Illuminate\Http\Request;


class TourController extends Controller
{
    public function create()
    {
        $description = session('tour_description', ''); // Lấy giá trị của description từ session
        return view('admin.tours.create', compact('description'));

    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'idTour' => 'required|string|max:15|unique:tbltour,idTour',
            'name' => 'nullable|string|max:50',
            'startDay' => 'nullable|date',
            'endDay' => 'nullable|date',
            'cost' => 'nullable|numeric',
            'idAddress' => 'nullable|string|max:15',
            'idHotel' => 'nullable|string|max:15',
            'idVehicle' => 'nullable|string|max:15',
            'idTourGuide' => 'nullable|string|max:15',
        ]);
        session()->flash('tour_description', $request->input('description'));
        Tour::create($data);

        return redirect()->route('admin.tours.view');
    }
    public function index()
    {
        $tours = Tour::all(); // Lấy tất cả các tour từ database
        return view('admin.tours.view', compact('tours')); // Trả về view index với dữ liệu các tour
    }
}
