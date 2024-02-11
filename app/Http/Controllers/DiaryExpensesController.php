<?php

namespace App\Http\Controllers;

use App\DiaryExpenses;
use App\Grade;
use App\Subject;
use App\Teacher;
use Illuminate\Http\Request;

class DiaryExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incomes = DiaryExpenses::where('type', 1)->orderBy('id', 'desc')->paginate(10);

        $expenses = DiaryExpenses::where('type', 2)->orderBy('id', 'desc')->paginate(10);

        return view('backend.expenseDiary.index', compact('incomes', 'expenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend.expenseDiary.create');
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
            'type'        => 'required',
            'amount'        => 'required',
            'description'        => 'required'
        ]);

        DiaryExpenses::create([
            'type'        => $request->type,
            'amount'     => $request->amount,
            'description'        => $request->description
        ]);

        return redirect()->route('dayBook.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $details = DiaryExpenses::findOrFail($id);

        return view('backend.expenseDiary.edit', compact('details'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'type'        => 'required',
            'amount'        => 'required',
            'description'        => 'required'
        ]);

        $dayBook = DiaryExpenses::findOrFail($request->id);

        $dayBook->update([
            'type'        => $request->type,
            'amount'     => $request->amount,
            'description'        => $request->description
        ]);

        return redirect()->route('dayBook.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dayBook = DiaryExpenses::findOrFail($id);

        $dayBook->delete();

        return redirect()->route('dayBook.index');
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
}
