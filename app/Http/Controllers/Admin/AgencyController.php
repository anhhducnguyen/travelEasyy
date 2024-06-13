<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Agency;
use App\Models\TourGuide;
use Illuminate\Http\Request;

// class AgencyController extends Controller
// {
//     public function index()
//     {
//         $agencies = Agency::with('tourGuide')->get();
//         return view('admin.agencies.index', compact('agencies'));
//     }

//     public function create()
//     {
//         $tourGuides = TourGuide::all();
//         return view('admin.agencies.create', compact('tourGuides'));
//     }

//     public function store(Request $request)
//     {
//         $data = $request->validate([
//             'idAgency' => 'required|string|max:15|unique:tblagency,idAgency',
//             'name' => 'nullable|string|max:50',
//             'phone' => 'nullable|string|max:15',
//             'idTourGuide' => 'nullable|string|max:15|exists:tbltourguide,idTourGuide',
//             'city' => 'required|string|max:50',
//             'district' => 'required|string|max:50',
//             'ward' => 'required|string|max:50',
//             'detailAddress' => 'nullable|string|max:50',
//         ]);

//         $address = Address::create([
//             'idAddress' => $data['idAgency'],
//             'city' => $data['city'],
//             'district' => $data['district'],
//             'ward' => $data['ward'],
//             'detailAddress' => $data['detailAddress'],
//         ]);

//         Agency::create([
//             'idAgency' => $data['idAgency'],
//             'idAddress' => $address->idAddress,
//             'name' => $data['name'],
//             'phone' => $data['phone'],
//             'idTourGuide' => $data['idTourGuide'],
//         ]);

//         return redirect()->route('admin.agencies.index');
//     }

//     public function edit($id)
//     {
//         $agency = Agency::findOrFail($id);
//         $tourGuides = TourGuide::all();
//         return view('admin.agencies.edit', compact('agency', 'tourGuides'));
//     }

//     public function update(Request $request, $id)
//     {
//         $data = $request->validate([
//             'name' => 'nullable|string|max:50',
//             'phone' => 'nullable|string|max:15',
//             'idTourGuide' => 'nullable|string|max:15|exists:tbltourguide,idTourGuide',
//             'city' => 'required|string|max:50',
//             'district' => 'required|string|max:50',
//             'ward' => 'required|string|max:50',
//             'detailAddress' => 'nullable|string|max:50',
//         ]);

//         $agency = Agency::findOrFail($id);

//         $address = Address::updateOrCreate(
//             ['idAddress' => $agency->idAddress],
//             [
//                 'city' => $data['city'],
//                 'district' => $data['district'],
//                 'ward' => $data['ward'],
//                 'detailAddress' => $data['detailAddress'],
//             ]
//         );

//         $agency->update([
//             'name' => $data['name'],
//             'phone' => $data['phone'],
//             'idTourGuide' => $data['idTourGuide'],
//         ]);

//         return redirect()->route('admin.agencies.index');
//     }

//     public function destroy($id)
//     {
//         $agency = Agency::findOrFail($id);
//         $agency->delete();

//         $address = Address::findOrFail($agency->idAddress);
//         $address->delete();

//         return redirect()->route('admin.agencies.index');
//     }
// }
