<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\ExamType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ExamTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $examtype = ExamType::all();
        return view('setup.exam_type.view_exam_type', compact('examtype'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('setup.exam_type.add_exam_type');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedexamtype = $request->validate([
            'name' => 'required|unique:exam_types,name',

        ]);

        $examtype = new ExamType();
        $examtype->name = $request->name;
        $examtype->save();
        if ($examtype instanceof Model) {
            toastr()->success('Exam Type Inserted Successfully');

            return redirect()->route('exam.type.view');
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
        $examtype = ExamType::find($id);
        return view('setup.exam_type.edit_exam_type', compact('examtype'));
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
        $examtype = ExamType::find($id);

        $validatedexamtype = $request->validate([
            'name' => 'required|unique:exam_types,name,' . $examtype->id

        ]);


        $examtype->name = $request->name;
        $examtype->save();
        if ($examtype instanceof Model) {
            toastr()->success('Exam Type updated Successfully');

            return redirect()->route('exam.type.view');
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
        $examtype = ExamType::find($id);
        $examtype->delete();
        if ($examtype instanceof Model) {
            toastr()->success('Exam Type deleted Successfully');

            return redirect()->route('exam.type.view');
        }

        toastr()->error('An error has occurred please try again later.');

        return back();
    }
}
