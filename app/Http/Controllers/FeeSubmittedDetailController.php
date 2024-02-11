<?php

namespace App\Http\Controllers;

use App\Grade;
use App\FeeSubmittedDetails;
use App\Parents;
use Illuminate\Http\Request;

class FeeSubmittedDetailController extends Controller
{
    public function create(Request $request, $id)
    {
        $studentId = $id;
        return view('backend.fees.create', compact('studentId'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'month' => 'required|string',
            'fee_submitted' => 'required|numeric',
        ]);

        $feeSubmittedDetail = FeeSubmittedDetails::create([
            'student_id' => $request->input('student_id'),
            'month' => $request->input('month'),
            'fee_submitted' => $request->input('fee_submitted'),
        ]);
        return redirect()->route('student.edit', ['student' => $request->input('student_id')]);
//        return response()->json(['message' => 'Fee submitted details added successfully', 'data' => $feeSubmittedDetail]);
    }

    public function edit(Request $request, FeeSubmittedDetails $feeSubmittedDetail)
    {
        $request->validate([
            'month' => 'required|string',
            'fee_submitted' => 'required|numeric',
        ]);

        $feeSubmittedDetail->update([
            'month' => $request->input('month'),
            'fee_submitted' => $request->input('fee_submitted'),
        ]);

        return response()->json(['message' => 'Fee submitted details updated successfully']);
    }
}
