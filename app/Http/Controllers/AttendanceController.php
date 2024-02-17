<?php

namespace App\Http\Controllers;

use App\Grade;
use App\Teacher;
use Carbon\Carbon;
use App\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach ($request->attendance as $attendanceData) {
            // Check if there is already a record for the same class, student, and attendance date
            $existingRecord = Attendance::where('class_id', $attendanceData['class_id'])
                ->where('student_id', $attendanceData['student_id'])
                ->where('attendence_date', $attendanceData['attendence_date'])
                ->first();

            // If no record exists, create a new one
            if (!$existingRecord) {
                Attendance::create([
                    'class_id'          => $attendanceData['class_id'],
                    'student_id'        => $attendanceData['student_id'],
                    'attendence_date'   => $attendanceData['attendence_date'],
                    'attendence_status' => $attendanceData['attendence_status']
                ]);
            } else {
                // Update the existing record if the status is different and 'attendence_status' is set in $attendanceData
                if (isset($attendanceData['attendence_status']) && $existingRecord->attendence_status != $attendanceData['attendence_status']) {
                    $existingRecord->attendence_status = $attendanceData['attendence_status'];
                    $existingRecord->save();
                }
            }
        }

        return redirect()->route('classes.index');
    }


    public function teacher_store(Request $request)
    {
        foreach ($request->attendance as $attendanceData) {

            $existingRecord = Attendance::where('teacher_id', $attendanceData['teacher_id'])
                ->where('attendence_date', $attendanceData['attendence_date'])
                ->first();

            if (!$existingRecord) {
                Attendance::create([
                    'teacher_id'        => $attendanceData['teacher_id'],
                    'attendence_date'   => $attendanceData['attendence_date'],
                    'attendence_status' => $attendanceData['attendence_status']
                ]);
            } else {

                if (isset($attendanceData['attendence_status']) && $existingRecord->attendence_status != $attendanceData['attendence_status']) {
                    $existingRecord->attendence_status = $attendanceData['attendence_status'];
                    $existingRecord->save();
                }
            }
        }

        return redirect()->route('teacher.attends');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance)
    {
        $attendances = Attendance::where('student_id',$attendance->id)->get();

        return view('backend.attendance.show', compact('attendances'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
