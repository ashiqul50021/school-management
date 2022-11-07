<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentYear;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class StudentYearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studentYear = StudentYear::all();
        return view('setup.year.view_year', compact('studentYear'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('setup.year.add_year');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validationStudentYear = $request->validate([
            'name' => 'required|unique:student_years,name',

        ]);

        $studentYear = new StudentYear();
        $studentYear->name = $request->name;
        $studentYear->save();
        if ($studentYear instanceof Model) {
            toastr()->success('Student Year Inserted Successfully');

            return redirect()->route('student.year.view');
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
        $studentYear = StudentYear::find($id);
	    	return view('setup.year.edit_year',compact('studentYear'));
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
        $studentYear = StudentYear::find($id);
     
     $validationStudentYear = $request->validate([
    		'name' => 'required|unique:student_years,name,'.$studentYear->id
    		
    	]);

    	
    	$studentYear->name = $request->name;
    	$studentYear->save();
        if ($studentYear instanceof Model) {
            toastr()->success('Student Year updated Successfully');

            return redirect()->route('student.year.view');
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
        $studentYear = StudentYear::find($id);
	    	$studentYear->delete();
            if ($studentYear instanceof Model) {
                toastr()->success('Student Year deleted Successfully');
    
                return redirect()->route('student.year.view');
            }
    
            toastr()->error('An error has occurred please try again later.');
    
            return back();

    }
}