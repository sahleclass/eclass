<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Attandance;
use App\Location;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'location_id' => 'required|exists:locations,id',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);
        $inputs = $request->all();
        $inputs['location_id'] = $this->checkLocation($request);
        
        Attandance::create($inputs);

        return response()->json(['message' => 'Attendance recorded successfully']);
    }

    public function checkLocation(Request $request)
    {
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');
        $location_id = $request->input('location_id');
        
        $radius = $request->input('radius', 1); // default radius is 1 km
    
        try {
            $location = Location::selectRaw(
                'id, name, latitude, longitude, 
                ( 6371 * acos( cos( radians(?) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(?) ) + sin( radians(?) ) * sin( radians( latitude ) ) ) ) AS distance',
                [$latitude, $longitude, $latitude]
            )
            ->having('distance', '<', $radius)
            ->orderBy('distance')
            ->where('id',$location_id)
            ->first();
    
            return $location->id;
    
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while retrieving locations', 'message' => $e->getMessage()], 500);
        }
    }
}
