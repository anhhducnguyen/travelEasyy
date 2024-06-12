<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use Illuminate\Http\Request;

class tourDetailController extends Controller
{
//     public function tour_detail($idTour)
//     {
//         $tour = Tour::where('idTour', $idTour)->firstOrFail();
//         return view('tour_detail', compact('tour'));
//     }
//     public function create()
//     {
//         return view('admin.tours.create');
//     }

//     public function store(Request $request)
//     {
//         $data = $request->validate([
//             'idTour' => 'required|string|max:15|unique:tbltour,idTour',
//             'name' => 'nullable|string|max:50',
//             'startDay' => 'nullable|date',
//             'endDay' => 'nullable|date',
//             'cost' => 'nullable|numeric',
//             'idAddress' => 'nullable|string|max:15',
//             'idHotel' => 'nullable|string|max:15',
//             'idVehicle' => 'nullable|string|max:15',
//             'idTourGuide' => 'nullable|string|max:15',
//         ]);

//         Tour::create($data);

//         return redirect()->route('admin.tours.index');
//     }
}
