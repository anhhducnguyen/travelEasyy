<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ActiveTourChecker;
use App\Helpers\IdGenerator;
use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Hotel;
use App\Models\Tour;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index()
    {
        $hotels = Hotel::with('address')->get();
        return view('admin.hotels.index', compact('hotels'));
    }

    public function create()
    {
        return view('admin.hotels.create');
    }

    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'name' => 'nullable|string|max:50',
                'city' => 'required|string|max:50',
                'district' => 'required|string|max:50',
                'ward' => 'required|string|max:50',
                'detailAddress' => 'nullable|string|max:50',
            ]);
        
            $address = Address::create([
                'city' => $data['city'],
                'district' => $data['district'],
                'ward' => $data['ward'],
                'detailAddress' => $data['detailAddress'],
            ]);
    
            $newId = IdGenerator::generateId('HT', Hotel::class, 'idHotel');       
    
            Hotel::create([
                'idHotel' => $newId,
                'idAddress' => $address->idAddress,
                'name' => $data['name'],
            ]);
    
            return redirect()->route('admin.hotels.index')->with('success', 'Hotel created successfully.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Failed to create hotel. ' . $e->getMessage());
        }
        
    }

    public function edit($id)
    {
        $hotel = Hotel::findOrFail($id);
        $address = $hotel->address; 
    
        return view('admin.hotels.edit', compact('hotel', 'address'));
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $request->validate([
                'name' => 'nullable|string|max:50',
                'city' => 'required|string|max:50',
                'district' => 'required|string|max:50',
                'ward' => 'required|string|max:50',
                'detailAddress' => 'nullable|string|max:50',
            ]);
        
            $hotel = Hotel::findOrFail($id);
            $hotel->update([
                'name' => $data['name'],
            ]);

            $hotel->address->update([
                'city' => $data['city'],
                'district' => $data['district'],
                'ward' => $data['ward'],
                'detailAddress' => $data['detailAddress'],
            ]);

            return redirect()->route('admin.hotels.index')->with('success', 'Hotel updated successfully.');
    
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Failed to update hotel. ' . $e->getMessage());
        }
        
    }

    public function destroy($id)
    {
        $hotel = Hotel::findOrFail($id);

        // Kiểm tra xem hotel có liên kết với bất kỳ tour nào đang hoạt động hay không
        if (ActiveTourChecker::hasActiveTours('idHotel', $id)) {
            // Nếu hotel đang liên kết với tour chưa kết thúc, không cho phép xoá
            return back()->with('error', 'Cannot delete this hotel because it is linked to active tours.');
        }
        
        $hotel->delete();

        $address = Address::findOrFail($hotel->idAddress);
        $address->delete();

        return redirect()->route('admin.hotels.index')->with('success', 'Hotel deleted successfully.');
    }
}
