<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Diary;
use App\Grade;
use App\Student;
use App\Subject;
use App\Teacher;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $type = $request->type;

        $classes = Grade::withCount('students')->where('type', $type)->orderBy('id', 'desc')->paginate(50);

        return view('backend.classes.index', compact('classes'));
    }

    public function attends($id)
    {
        $class = Grade::findOrFail($id);

        $students = $class->students()->with('user')->paginate(50);

        return view('backend.attendance.index', compact('class', 'students' ));
    }

    public function attends_view($id)
    {
        $class = Grade::findOrFail($id);

        $diaries = Diary::findDiary($id);

        $students = $class->students()->with('user')->paginate(50);

        $attendances = Attendance::where('class_id', $id)
            ->whereMonth('attendence_date', now()->month)
            ->with(['student', 'teacher.user', 'class'])
            ->get();

        return view('backend.attendance.show', compact('class', 'students', 'attendances', 'diaries'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = Teacher::latest()->get();

        return view('backend.classes.create', compact('teachers'));
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
            'class_name'        => 'required|string|max:255|unique:grades',
        ]);

        Grade::create([
            'class_name'        => $request->class_name,
            'class_numeric'     => $request->class_numeric,
            'teacher_id'        => $request->teacher_id,
            'class_description' => $request->class_description,
            'type' => $request->type
        ]);

        return redirect()->route('classes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function show(Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teachers = Teacher::latest()->get();
        $class = Grade::findOrFail($id);

        return view('backend.classes.edit', compact('class','teachers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'class_name'        => 'required|string|max:255|unique:grades,class_name,'.$id

        ]);

        $class = Grade::findOrFail($id);

        $class->update([
            'class_name'        => $request->class_name,
            'class_numeric'     => $request->class_numeric,
            'teacher_id'        => $request->teacher_id,
            'class_description' => $request->class_description,
            'type' => $request->type
        ]);

        return redirect()->route('classes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $class = Grade::findOrFail($id);

        $class->subjects()->detach();
        $class->delete();

        return back();
    }

    /*
     * Assign Subjects to Grade
     *
     * @return \Illuminate\Http\Response
     */
    public function assignSubject($classid)
    {
        $subjects   = Subject::latest()->get();
        $assigned   = Grade::with(['subjects','students'])->findOrFail($classid);

        return view('backend.classes.assign-subject', compact('classid','subjects','assigned'));
    }

    /*
     * Add Assigned Subjects to Grade
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeAssignedSubject(Request $request, $id)
    {
        $class = Grade::findOrFail($id);

        $class->subjects()->sync($request->selectedsubjects);

        return redirect()->route('classes.index');
    }

    public function imageUpload()
    {
        return view('imageUpload');
    }

    public function deleteDiary($id)
    {
        $diary = Diary::find($id);
        if (!$diary) {
            return back()->with('error', 'Diary entry not found.');
        }

        $diary->delete();

        return back()->with('success', 'Diary entry deleted successfully.');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUploadPost(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        $diary = new Diary();
        $diary->image_name = $imageName;
        $diary->class_id = $request->class_id;
        $diary->save();

        return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName);
    }
}
