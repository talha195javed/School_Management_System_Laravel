<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Grade;
use App\FeeSubmittedDetails;
use App\Parents;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FeeSubmittedDetailController extends Controller
{
    public function create(Request $request, $id)
    {
        $studentId = $id;
        return view('backend.fees.create', compact('studentId'));
    }

    public function pay_create(Request $request, $id)
    {
        $teacherId = $id;
        $startDate = now()->subMonth()->startOfMonth()->toDateString();

        $endDate = now()->subMonth()->endOfMonth()->toDateString();

        $startDates = now()->subMonth()->startOfMonth();
        $endDates = now()->subMonth()->endOfMonth();

        $numberOfDays = $endDates->diffInDays($startDates) + 1;

        $attendances = Attendance::where('teacher_id', $teacherId)
            ->where('attendence_status', 0)
            ->whereBetween('attendence_date', [$startDate, $endDate])
            ->count();

        return view('backend.pays.create', compact('teacherId', 'attendances', 'numberOfDays'));
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
   }

    public function paystore(Request $request)
    {
        $request->validate([
            'month' => 'required|string',
            'pay_paid' => 'required|numeric',
        ]);

        $feeSubmittedDetail = FeeSubmittedDetails::create([
            'teacher_id' => $request->input('teacher_id'),
            'month' => $request->input('month'),
            'pay_paid' => $request->input('pay_paid'),
        ]);
        return redirect()->route('teacher.edit', ['teacher' => $request->input('teacher_id')]);
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
