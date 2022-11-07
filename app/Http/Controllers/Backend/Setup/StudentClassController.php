<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class StudentClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studentClass = StudentClass::all();
        return view('setup.student_class.view_class', compact('studentClass'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('setup.student_class.add_class');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedStudentClass = $request->validate([
            'name' => 'required|unique:student_classes,name',

        ]);

        $studentClass = new StudentClass();
        $studentClass->name = $request->name;
        $studentClass->save();
        if ($studentClass instanceof Model) {
            toastr()->success('Student Class Inserted Successfully');

            return redirect()->route('student.class.view');
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
        $editStudentClass = StudentClass::find($id);
        return view('setup.student_class.edit_class', compact('editStudentClass'));
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
        $studentClass = StudentClass::find($id);

        $validatedData = $request->validate([
            'name' => 'required|unique:student_classes,name,' . $studentClass->id

        ]);


        $studentClass->name = $request->name;
        $studentClass->save();
        if ($studentClass instanceof Model) {
            toastr()->success('Student Class Updated Successfully');

            return redirect()->route('student.class.view');
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
        $studentClass = StudentClass::find($id);
    	$studentClass->delete();
        if ($studentClass instanceof Model) {
            toastr()->success('Student Class deleted Successfully');

            return redirect()->route('student.class.view');
        }

        toastr()->error('An error has occurred please try again later.');

        return back();
    }
}