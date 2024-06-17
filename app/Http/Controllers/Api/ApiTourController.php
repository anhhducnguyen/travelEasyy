<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Models\Tour;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiTourController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $tours = Tour::with(['hotel', 'vehicle', 'tourGuide', 'address'])
                    ->where('endDay', '>', Carbon::now())
                    ->get();

        return response()->json(['tours' => $tours], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Validate input
        $validator = Validator::make($request->all(), [
            'idTour'=>'required|string|max:15',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'cost' => 'required|numeric',
            'startDay' => 'required|date',
            'endDay' => 'required|date|after:startDay',
            'imageTour' => 'required|string',
            'idAddress' => 'required|exists:tbladdress,idAddress',
            'idHotel' => 'required|exists:tblhotel,idHotel',
            'idVehicle' => 'required|exists:tblvehicle,idVehicle',
            'idTourGuide' => 'required|exists:tbltourguide,idTourGuide',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Create new tour
        $tour = Tour::create($request->all());

        return response()->json(['tour' => $tour], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(string $id)
    {
        $tour = Tour::with(['hotel', 'vehicle', 'tourGuide', 'address'])
                    ->find($id);

        if (!$tour) {
            return response()->json(['error' => 'Tour not found'], 404);
        }

        return response()->json(['tour' => $tour], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        // Validate incoming request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'startDay' => 'required|date',
            'endDay' => 'required|date|after:startDay',
            'cost' => 'required|numeric',
            'imageTour' => 'required|string',
            'description' => 'nullable|string',
            'idAddress' => 'required|exists:tbladdress,idAddress',
            'idHotel' => 'required|exists:tblhotel,idHotel',
            'idVehicle' => 'required|exists:tblvehicle,idVehicle',
            'idTourGuide' => 'required|exists:tbltourguide,idTourGuide',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Find the tour by ID
        $tour = Tour::findOrFail($id);

        // Update the tour attributes
        $tour->fill($request->all());
        $tour->save();

        // Return a JSON response with the updated tour
        return response()->json(['tour' => $tour]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(string $id)
    {
        $tour = Tour::find($id);

        if (!$tour) {
            return response()->json(['error' => 'Tour not found.'], 404);
        }

        // Delete tour
        $tour->delete();

        // Return success message
        return response()->json(['message' => 'Tour deleted successfully.']);
    }
}
