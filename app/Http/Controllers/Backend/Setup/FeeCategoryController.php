<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\FeeCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class FeeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feeCategories = FeeCategory::all();
        return view('setup.fee_category.view_fee_cat', compact('feeCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('setup.fee_category.add_fee_cat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validationFeeCat = $request->validate([
            'name' => 'required|unique:fee_categories,name',

        ]);

        $feeCategories = new FeeCategory();
        $feeCategories->name = $request->name;
        $feeCategories->save();

        if ($feeCategories instanceof Model) {
            toastr()->success('Fee Category Inserted Successfully');

            return redirect()->route('fee.category.view');
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
        $feeCategories = FeeCategory::find($id);
	    	return view('setup.fee_category.edit_fee_cat',compact('feeCategories'));
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
        $feeCategories = FeeCategory::find($id);
     
        $validationFeeCat = $request->validate([
               'name' => 'required|unique:fee_categories,name,'.$feeCategories->id
               
           ]);
   
           
           $feeCategories->name = $request->name;
           $feeCategories->save();
           if ($feeCategories instanceof Model) {
            toastr()->success('Fee Category updated Successfully');

            return redirect()->route('fee.category.view');
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
        $feeCategories = FeeCategory::find($id);
	    	$feeCategories->delete();
            if ($feeCategories instanceof Model) {
                toastr()->success('Fee Category Deleted Successfully');
    
                return redirect()->route('fee.category.view');
            }
    
            toastr()->error('An error has occurred please try again later.');
    
            return back();
    }
}