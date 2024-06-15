<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\IdGenerator;
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
            'name' => 'string|max:50',
            'startDay' => 'date',
            'endDay' => 'date',
            'cost' => 'numeric',
            'city' => 'required|string|max:50',
            'district' => 'required|string|max:50',
            'ward' => 'required|string|max:50',
            'detailAddress' => 'nullable|string|max:50',
            'idHotel' => 'nullable|string|max:15',
            'idVehicle' => 'nullable|string|max:15',
            'idTourGuide' => 'nullable|string|max:15',
            'imagePath' => 'string|max:255',
            'description' => 'nullable|string',
        ]);
        

        $address = Address::updateOrCreate([
            'city' => $data['city'],
            'district' => $data['district'],
            'ward' => $data['ward'],
            'detailAddress' => $data['detailAddress'],
        ]);

        $newId = IdGenerator::generateId('TO', Tour::class, 'idTour');   

        Tour::create ([
            'idTour' => $newId,
            'name' => $data['name'],
            'startDay' => $data['startDay'],
            'endDay' => $data['endDay'],
            'cost' => $data['cost'],
            'idAddress' => $address->idAddress,
            'idHotel' => $data['idHotel'],
            'idVehicle' => $data['idVehicle'],
            'idTourGuide' => $data['idTourGuide'],
            'description' => $data['description'], 
            'imageTour' => $data['imagePath'],
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
            'name' => 'string|max:50',
            'startDay' => 'date',
            'endDay' => 'date',
            'cost' => 'numeric',
            'city' => 'required|string|max:50',
            'district' => 'required|string|max:50',
            'ward' => 'required|string|max:50',
            'detailAddress' => 'nullable|string|max:50',
            'idHotel' => 'nullable|string|max:15',
            'idVehicle' => 'nullable|string|max:15',
            'idTourGuide' => 'nullable|string|max:15',
            'imagePath' => 'string|max:255',
            'description' => 'nullable|string',
        ]);

        $tour = Tour::findOrFail($id);
       
    
        $tour->update([
            'name' => $data['name'],
            'startDay' => $data['startDay'],
            'endDay' => $data['endDay'],
            'cost' => $data['cost'],
            'idHotel' => $data['idHotel'],
            'idVehicle' => $data['idVehicle'],
            'idTourGuide' => $data['idTourGuide'],
            'description' => $data['description'],
            'imageTour' => $data['imagePath'],
        ]);
    
        // Cập nhật dữ liệu địa chỉ
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

    public function filterHotels(Request $request)
{
    $city = $request->get('city');
    $district = $request->get('district');

    $hotels = Hotel::whereHas('address', function ($query) use ($city, $district) {
        $query->where('city', $city)
              ->where('district', $district);
    })->get();

    return response()->json($hotels);
}

}
