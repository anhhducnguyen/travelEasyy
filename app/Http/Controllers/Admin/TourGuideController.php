<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ActiveTourChecker;
use App\Helpers\IdGenerator;
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
            'name' => 'nullable|string|max:50',
            'phone' => 'nullable|string|max:50',
            'email' => 'nullable|string|max:50',
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
        $newId = IdGenerator::generateId('TG', TourGuide::class, 'idTourGuide');   
        // Create the tour guide
        TourGuide::create([
            'idTourGuide' => $newId,
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
        if (ActiveTourChecker::hasActiveTours('idTourGuide', $id)) {
            // Nếu tour guide đang liên kết với tour chưa kết thúc, không cho phép xoá
            return back()->with('error', 'Cannot delete this tour guide because it is linked to active tours.');
        }
        
        $tourGuide->delete();
        $address = Address::findOrFail($tourGuide->idAddress);
        $address->delete();

        return redirect()->route('admin.tourguides.index')->with('success', 'Tour guide deleted successfully.');
    }
}
