<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Tour;
use App\Models\TourGuide;
use Illuminate\Http\Request;

class TourGuideController extends Controller
{
    public function index()
    {
        $tourGuides = TourGuide::with('address')->get();
        return view('admin.tourguides.index', compact('tourGuides'));
    }

    public function create()
    {
        return view('admin.tourguides.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $data = $request->validate([
            'idTourGuide' => 'required|string|max:15|unique:tbltourguide,idTourGuide',
            'name' => 'nullable|string|max:50',
            'phone' => 'nullable|string|max:50',
            'email' => 'nullable|string|max:50',
            'city' => 'required|string|max:50',
            'district' => 'required|string|max:50',
            'ward' => 'required|string|max:50',
            'detailAddress' => 'nullable|string|max:50',
        ]);

        // Create the address first
        $address = Address::create([
            'idAddress' => $data['idTourGuide'], // Assuming you want to use the same ID
            'city' => $data['city'],
            'district' => $data['district'],
            'ward' => $data['ward'],
            'detailAddress' => $data['detailAddress'],
        ]);

        // Create the tour guide
        TourGuide::create([
            'idTourGuide' => $data['idTourGuide'],
            'idAddress' => $address->idAddress,
            'name' => $data['name'],
            'phone' => $data['phone'],
            'email' => $data['email'],
        ]);

        return redirect()->route('admin.tourguides.index');
    }


    public function edit($id)
    {
        $tourGuide = TourGuide::with('address')->findOrFail($id);
        return view('admin.tourguides.edit', compact('tourGuide'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'city' => 'required|string|max:50',
            'district' => 'required|string|max:50',
            'ward' => 'required|string|max:50',
            'detailAddress' => 'nullable|string|max:50',
            'name' => 'nullable|string|max:50',
            'phone' => 'nullable|string|max:50',
            'email' => 'nullable|string|max:50',
        ]);

        $tourGuide = TourGuide::findOrFail($id);
        $tourGuide->update([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'email' => $data['email'],
        ]);

        $tourGuide->address->update([
            'city' => $data['city'],
            'district' => $data['district'],
            'ward' => $data['ward'],
            'detailAddress' => $data['detailAddress'],
        ]);

        return redirect()->route('admin.tourguides.index');
    }

    public function destroy($id)
    {
        $tourGuide = TourGuide::findOrFail($id);
        // Kiểm tra xem tour guide có liên kết với bất kỳ tour nào đang hoạt động hay không
        $activeTours = Tour::where('idTourGuide', $id)
                           ->where('endDay', '>=', now()) // Chỉ xem xét các tour chưa kết thúc
                           ->exists();
        if ($activeTours) {
            // Nếu tour guide đang liên kết với tour chưa kết thúc, không cho phép xoá
            return back()->with('error', 'Cannot delete this tour guide because it is linked to active tours.');
        }
        // Lấy danh sách các tour liên kết với tour guide
        $tours = Tour::where('idTourGuide', $id)->get();

        // Xoá địa chỉ của các tour liên kết
        foreach ($tours as $tour) {
            if ($tour->idAddress) {
                $address = Address::find($tour->idAddress);
                if ($address) {
                    $address->delete();
                }
            }
        }
        $tourGuide->delete();
        $address = Address::findOrFail($tourGuide->idAddress);
        $address->delete();

        return redirect()->route('admin.tourguides.index')->with('success', 'Tour guide deleted successfully.');;
    }
}
