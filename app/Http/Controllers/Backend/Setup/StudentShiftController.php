<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentShift;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class StudentShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studentShift = StudentShift::all();
        return view('setup.shift.view_shift', compact('studentShift'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('setup.shift.add_shift');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $studentShiftvalidated = $request->validate([
            'name' => 'required|unique:student_shifts,name',

        ]);

        $studentShift = new StudentShift();
        $studentShift->name = $request->name;
        $studentShift->save();
        if ($studentShift instanceof Model) {
            toastr()->success('Student Shift Added Successfully');

            return redirect()->route('student.shift.view');
        }

        toastr()->error('An error has occurred please try again later.');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $studentShift = StudentShift::find($id);
        return view('setup.shift.edit_shift', compact('studentShift'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $studentShift = StudentShift::find($id);

        $validatedstudentshift = $request->validate([
            'name' => 'required|unique:student_shifts,name,' . $studentShift->id

        ]);


        $studentShift->name = $request->name;
        $studentShift->save();
        if ($studentShift instanceof Model) {
            toastr()->success('Student Shift updated Successfully');

            return redirect()->route('student.shift.view');
        }

        toastr()->error('An error has occurred please try again later.');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $studentShift = StudentShift::find($id);
        $studentShift->delete();
        if ($studentShift instanceof Model) {
            toastr()->success('Student Shift deleted Successfully');

            return redirect()->route('student.shift.view');
        }

        toastr()->error('An error has occurred please try again later.');

        return back();
    }
}