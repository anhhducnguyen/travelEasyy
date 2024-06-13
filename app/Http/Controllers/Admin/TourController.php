<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Hotel;
use App\Models\Tour;
use App\Models\TourGuide;
use App\Models\Vehicle;
use Illuminate\Http\Request;


class TourController extends Controller
{
    public function index()
    {
        $tours = Tour::with('address', 'hotel', 'vehicle', 'tourGuide')->get();
        return view('admin.tours.index', compact('tours'));
    }

    public function create()
    {
        $hotels = Hotel::all();
        $vehicles = Vehicle::all();
        $tourGuides = TourGuide::all();
        return view('admin.tours.create', compact('hotels', 'vehicles', 'tourGuides'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'idTour' => 'required|string|max:15|unique:tbltour,idTour',
            'name' => 'nullable|string|max:50',
            'startDay' => 'nullable|date',
            'endDay' => 'nullable|date',
            'cost' => 'nullable|numeric',
            'city' => 'required|string|max:50',
            'district' => 'required|string|max:50',
            'ward' => 'required|string|max:50',
            'detailAddress' => 'nullable|string|max:50',
            'idHotel' => 'nullable|string|max:15',
            'idVehicle' => 'nullable|string|max:15',
            'idTourGuide' => 'nullable|string|max:15',
        ]);
        // Create the address first
        $address = Address::updateOrCreate([
            'idAddress' => $data['idTour'], // Assuming you want to use the same ID
            'city' => $data['city'],
            'district' => $data['district'],
            'ward' => $data['ward'],
            'detailAddress' => $data['detailAddress'],
        ]);

        Tour::create([
            'idTour' => $data['idTour'],
            'name'=> $data['name'],
            'startDay'=> $data['startDay'],
            'endDay'=> $data['endDay'],
            'cost'=> $data['cost'],
            'idAddress' => $address->idAddress,
            'idHotel'=> $data['idHotel'],
            'idVehicle' => $data['idVehicle'],
            'idTourGuide' => $data['idTourGuide'],
        ]);

        return redirect()->route('admin.tours.index');
    }

    public function edit($id)
    {
        $tour = Tour::with('address')->findOrFail($id);
        $hotels = Hotel::all();
        $vehicles = Vehicle::all();
        $tourGuides = TourGuide::all();
        return view('admin.tours.edit', compact('tour', 'hotels', 'vehicles', 'tourGuides'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'nullable|string|max:50',
            'startDay' => 'nullable|date',
            'endDay' => 'nullable|date',
            'cost' => 'nullable|numeric',
            'city' => 'required|string|max:50',
            'district' => 'required|string|max:50',
            'ward' => 'required|string|max:50',
            'detailAddress' => 'nullable|string|max:50',
            'idHotel' => 'nullable|string|max:15',
            'idVehicle' => 'nullable|string|max:15',
            'idTourGuide' => 'nullable|string|max:15',
        ]);

        $tour = Tour::findOrFail($id);
        $tour->update([
            'name'=> $data['name'],
            'startDay'=> $data['startDay'],
            'endDay'=> $data['endDay'],
            'cost'=> $data['cost'],
            'idHotel'=> $data['idHotel'],
            'idVehicle' => $data['idVehicle'],
            'idTourGuide' => $data['idTourGuide'],
        ]);
        
        $tour->address->update([
            'city' => $data['city'],
            'district' => $data['district'],
            'ward' => $data['ward'],
            'detailAddress' => $data['detailAddress'],
        ]);

        return redirect()->route('admin.tours.index');
    }

    public function destroy($id)
    {
        $tour = Tour::findOrFail($id);
        $tour->delete();

        $address = Address::findOrFail($tour->idAddress);
        $address->delete();
        return redirect()->route('admin.tours.index');
    }
}
