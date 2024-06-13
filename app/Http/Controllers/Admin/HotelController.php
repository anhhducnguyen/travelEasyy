<?php

namespace App\Http\Controllers\Admin;

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
        $data = $request->validate([
            'idHotel' => 'required|string|max:15|unique:tblhotel,idHotel',
            'name' => 'nullable|string|max:50',
            'city' => 'required|string|max:50',
            'district' => 'required|string|max:50',
            'ward' => 'required|string|max:50',
            'detailAddress' => 'nullable|string|max:50',
        ]);

        // Create the address first
        $address = Address::create([
            'idAddress' => $data['idHotel'],
            'city' => $data['city'],
            'district' => $data['district'],
            'ward' => $data['ward'],
            'detailAddress' => $data['detailAddress'],
        ]);

        // Create the hotel
        Hotel::create([
            'idHotel' => $data['idHotel'],
            'idAddress' => $address->idAddress,
            'name' => $data['name'],
        ]);

        return redirect()->route('admin.hotels.index');
    }

    public function edit($id)
    {
        $hotel = Hotel::with('address')->findOrFail($id);
        return view('admin.hotels.edit', compact('hotel'));
    }

    public function update(Request $request, $id)
    {
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

        return redirect()->route('admin.hotels.index');
    }

    public function destroy($id)
    {
        $hotel = Hotel::findOrFail($id);
        // Kiểm tra xem hotel có liên kết với bất kỳ tour nào đang hoạt động hay không
        $activeTours = Tour::where('idHotel', $id)
                           ->where('endDay', '>=', now()) // Chỉ xem xét các tour chưa kết thúc
                           ->exists();
        if ($activeTours) {
            // Nếu hotel đang liên kết với tour chưa kết thúc, không cho phép xoá
            return back()->with('error', 'Cannot delete this hotel because it is linked to active tours.');
        }
        // Lấy danh sách các tour liên kết với hotel
        $tours = Tour::where('idHotel', $id)->get();

        // Xoá địa chỉ của các tour liên kết
        foreach ($tours as $tour) {
            if ($tour->idAddress) {
                $address = Address::find($tour->idAddress);
                if ($address) {
                    $address->delete();
                }
            }
        }
        $hotel->delete();

        $address = Address::findOrFail($hotel->idAddress);
        $address->delete();

        return redirect()->route('admin.hotels.index');
    }
}
