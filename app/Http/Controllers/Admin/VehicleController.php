<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
            'idVehicle' => 'required|string|max:15|unique:tblvehicle,idVehicle',
            'name' => 'nullable|string|max:50',
            'licensePlate' => 'nullable|string|max:20',
        ]);

        Vehicle::create($data);

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
        $vehicle->delete();

        return redirect()->route('admin.vehicles.index');
    }
}
