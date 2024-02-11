<?php

namespace App\Http\Controllers;

use App\StationaryCharge;
use Illuminate\Http\Request;

class StationaryChargeController extends Controller
{
    public function create(Request $request, $id)
    {
        $studentId = $id;
        return view('backend.stationary.create', compact('studentId'));
    }
    public function edit(Request $request, StationaryCharge $stationaryCharge)
    {
        $request->validate([
            'stationary_details' => 'required|string',
            'stationary_charges' => 'required|numeric',
        ]);

        $stationaryCharge->update([
            'stationary_details' => $request->input('stationary_details'),
            'stationary_charges' => $request->input('stationary_charges'),
        ]);

        return response()->json(['message' => 'Stationary charges details updated successfully']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'stationary_details' => 'required|string',
            'stationary_charges' => 'required|numeric',
        ]);

        $stationaryCharge = StationaryCharge::create([
            'student_id' => $request->input('student_id'),
            'stationary_details' => $request->input('stationary_details'),
            'stationary_charges' => $request->input('stationary_charges'),
        ]);
        return redirect()->route('student.edit', ['student' => $request->input('student_id')]);

//        return response()->json(['message' => 'Stationary charges details added successfully', 'data' => $stationaryCharge]);
    }

}
