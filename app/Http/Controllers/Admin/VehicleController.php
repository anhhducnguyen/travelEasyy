<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ActiveTourChecker;
use App\Helpers\IdGenerator;
use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Tour;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('admin.vehicles.index', compact('vehicles'));
    }

    public function create()
    {
        return view('admin.vehicles.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'nullable|string|max:50',
            'licensePlate' => 'nullable|string|max:20',
        ]);
        $newId = IdGenerator::generateId('VH', Vehicle::class, 'idVehicle');   

        Vehicle::create([
            'idVehicle' => $newId,
            'name' => $data['name'],
            'licensePlate' => $data['licensePlate'],
        ]);

        return redirect()->route('admin.vehicles.index');
    }

    public function edit($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        return view('admin.vehicles.edit', compact('vehicle'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'nullable|string|max:50',
            'licensePlate' => 'nullable|string|max:20',
        ]);

        $vehicle = Vehicle::findOrFail($id);
        $vehicle->update($data);

        return redirect()->route('admin.vehicles.index');
    }

    public function destroy($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        
        // Kiểm tra xem Vehicle có liên kết với bất kỳ tour nào đang hoạt động hay không
        if (ActiveTourChecker::hasActiveTours('idVehicle', $id)) {
            // Nếu vehicle đang liên kết với tour chưa kết thúc, không cho phép xoá
            return back()->with('error', 'Cannot delete this vehicle because it is linked to active tours.');
        }
        
        $vehicle->delete();

        return redirect()->route('admin.vehicles.index')->with('success', 'Vehicle deleted successfully.');
    }
}
