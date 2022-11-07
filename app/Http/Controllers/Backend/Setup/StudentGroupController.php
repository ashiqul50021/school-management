<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentGroup;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class StudentGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studentGroup = StudentGroup::all();
        return view('setup.group.view_group', compact('studentGroup'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('setup.group.add_group');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $studentGroupValidated = $request->validate([
            'name' => 'required|unique:student_groups,name',

        ]);

        $studentGroup = new StudentGroup();
        $studentGroup->name = $request->name;
        $studentGroup->save();
        if ($studentGroup instanceof Model) {
            toastr()->success('Student group inserted Successfully');

            return redirect()->route('student.group.view');
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
        $studentGroup = StudentGroup::find($id);
        return view('setup.group.edit_group', compact('studentGroup'));
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
        $studentGroup = StudentGroup::find($id);

        $validatedData = $request->validate([
            'name' => 'required|unique:student_groups,name,' . $studentGroup->id

        ]);


        $studentGroup->name = $request->name;
        $studentGroup->save();
        if ($studentGroup instanceof Model) {
            toastr()->success('Student group updated Successfully');

            return redirect()->route('student.group.view');
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
        $studentGroup = StudentGroup::find($id);
        $studentGroup->delete();
        if ($studentGroup instanceof Model) {
            toastr()->success('Student group deleted Successfully');

            return redirect()->route('student.group.view');
        }

        toastr()->error('An error has occurred please try again later.');

        return back();
    }
}
