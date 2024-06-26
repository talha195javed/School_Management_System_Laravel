<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Diary;
use App\FeeSubmittedDetails;
use App\StationaryCharge;
use App\User;
use App\Grade;
use App\Parents;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $shift_type = $request->shift;
        $studentsQuery = Student::with('class')->latest();

        if ($request->has('shift')) {
            $shift = $request->shift;
            $studentsQuery->where('shift', $shift);
        }

        if ($request->has('status')) {
            $status = $request->status;
            $studentsQuery->where('status', $status);
        }

        $students = $studentsQuery->paginate(50);
        return view('backend.students.index', compact('students', 'shift_type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $shift_type = $request->shift;
        $classes = Grade::latest()->get();
        $parents = Parents::with('user')->latest()->get();

        return view('backend.students.create', compact('classes','parents', 'shift_type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
//            'name'              => 'required|string|max:255',
//            'email'             => 'required|string|email|max:255|unique:users',
//            'password'          => 'required|string|min:8',
//            'class_id'          => 'required|numeric',
//            'roll_number'       => [
//                'required',
//                'numeric',
//                Rule::unique('students')->where(function ($query) use ($request) {
//                    return $query->where('class_id', $request->class_id);
//                })
//            ],
//            'gender'            => 'required|string',
//            'shift'            => 'required|string',
//            'phone'             => 'required|string|max:255',
//            'dateofbirth'       => 'required|date',
//            'current_address'   => 'required|string|max:255',
//            'permanent_address' => 'required|string|max:255'
        ]);

        $user = User::create([
            'name'              => $request->name,
            'email'             => $request->email,
            'password_set'      => $request->password,
            'password'          => Hash::make($request->password)
        ]);

        if ($request->hasFile('profile_picture')) {
            $profile = Str::slug($user->name).'-'.$user->id.'.'.$request->profile_picture->getClientOriginalExtension();
            $request->profile_picture->move(public_path('images/profile'), $profile);
        } else {
            $profile = 'avatar.png';
        }
        $user->update([
            'profile_picture' => $profile
        ]);

        $user->student()->create([
            'admission_id'         => $request->admission_id,
            'admission_date'         => $request->admission_date,
            'father_name'         => $request->father_name,
            'cnic'         => $request->cnic,
            'father_cnic'         => $request->father_cnic,
            'guardian_name'         => $request->guardian_name,
            'religion'         => $request->religion,
            'mobile'         => $request->mobile,
            'father_profession'         => $request->father_profession,
            'driver_number'         => $request->driver_number,
            'class_id'          => $request->class_id,
            'roll_number'       => $request->roll_number,
            'gender'            => $request->gender,
            'shift'             => $request->shift,
            'status'            => $request->status,
            'phone'             => $request->phone,
            'dateofbirth'       => $request->dateofbirth,
            'current_address'   => $request->current_address,
            'permanent_address' => $request->permanent_address,
            'fee_decided' => $request->fee_decided,
            'stationary_decided' => $request->stationary_decided,
        ]);

        $user->assignRole('Student');

        return redirect()->route('student.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $diaries = Diary::findDiary($student->class_id);

        $class = Grade::with('subjects')->where('id', $student->class_id)->first();

        $feeSubmittedDetails = FeeSubmittedDetails::where('student_id', $student->id)->get();

        $stationaryCharges = StationaryCharge::where('student_id', $student->id)->get();

        $attendances = Attendance::where('student_id', $student->id)->get();

        return view('backend.students.show', compact('class', 'student', 'feeSubmittedDetails', 'stationaryCharges', 'attendances', 'diaries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $feeSubmittedDetails = FeeSubmittedDetails::where('student_id', $student->id)->get();

        $stationaryCharges = StationaryCharge::where('student_id', $student->id)->get();


        $classes = Grade::latest()->get();
        $parents = Parents::with('user')->latest()->get();

        return view('backend.students.edit', compact('classes','parents','student','feeSubmittedDetails', 'stationaryCharges'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name'              => 'required|string|max:255',
            'email'             => 'required|string|email|max:255|unique:users,email,'.$student->user_id,
////            'parent_id'         => 'required|numeric',
//            'class_id'          => 'required|numeric',
//            'roll_number'       => [
//                'required',
//                'numeric',
//                Rule::unique('students')->ignore($student->id)->where(function ($query) use ($request) {
//                    return $query->where('class_id', $request->class_id);
//                })
//            ],
//            'gender'            => 'required|string',
//            'shift'            => 'required|string',
//            'phone'             => 'required|string|max:255',
//            'dateofbirth'       => 'required|date',
            'current_address'   => 'required|string|max:255'
//            'permanent_address' => 'required|string|max:255'
        ]);

        if ($request->hasFile('profile_picture')) {
            $profile = Str::slug($student->user->name).'-'.$student->user->id.'.'.$request->profile_picture->getClientOriginalExtension();

            $request->profile_picture->move(public_path('images/profile'), $profile);
        } else {
            $profile = $student->user->profile_picture;
        }

        if ($request->password != null)
        {
            $password = Hash::make($request->password);
            $password_set = $request->password;
        } else {
            $password = $student->user->password;
            $password_set = $student->user->password_set;
        }
        $student->user()->update([
            'name'              => $request->name,
            'email'             => $request->email,
            'profile_picture'   => $profile,
            'password_set'   => $password_set,
            'password'          => $password
        ]);
        $student->update([
            'admission_id'         => $request->admission_id,
            'admission_date'         => $request->admission_date,
            'father_name'         => $request->father_name,
            'cnic'         => $request->cnic,
            'father_cnic'         => $request->father_cnic,
            'guardian_name'         => $request->guardian_name,
            'religion'         => $request->religion,
            'mobile'         => $request->mobile,
            'father_profession'         => $request->father_profession,
            'driver_number'         => $request->driver_number,
            'class_id'          => $request->class_id,
            'roll_number'       => $request->roll_number,
            'gender'            => $request->gender,
            'shift'             => $request->shift,
            'status'            => $request->status,
            'phone'             => $request->phone,
            'dateofbirth'       => $request->dateofbirth,
            'current_address'   => $request->current_address,
            'permanent_address' => $request->permanent_address,
            'fee_decided' => $request->fee_decided,
            'stationary_decided' => $request->stationary_decided,
            'result_card'       => $request->result_card,
            'certificate'       => $request->certificate
        ]);

        return redirect()->route('student.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $user = User::findOrFail($student->user_id);
        $user->student()->delete();
        $user->removeRole('Student');

        if ($user->delete()) {
            if($user->profile_picture != 'avatar.png') {
                $image_path = public_path() . '/images/profile/' . $user->profile_picture;
                if (is_file($image_path) && file_exists($image_path)) {
                    unlink($image_path);
                }
            }
        }

        return back();
    }
}
