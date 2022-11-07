<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\FeeCategory;
use App\Models\FeeCategoryAmount;
use App\Models\StudentClass;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class FeeAmountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feeCategoryAmount = FeeCategoryAmount::select('fee_category_id')->groupBy('fee_category_id')->get();
        return view('setup.fee_amount.view_fee_amount', compact('feeCategoryAmount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $feeCategory = FeeCategory::all();
        $studentClass = StudentClass::all();
        return view('setup.fee_amount.add_fee_amount', compact('feeCategory', 'studentClass'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $countClass = count($request->class_id);
        if ($countClass != NULL) {
            for ($i = 0; $i < $countClass; $i++) {
                $fee_amount = new FeeCategoryAmount();
                $fee_amount->fee_category_id = $request->fee_category_id;
                $fee_amount->class_id = $request->class_id[$i];
                $fee_amount->amount = $request->amount[$i];
                $fee_amount->save();
            } // End For Loop
        }
        if ($fee_amount instanceof Model) {
            toastr()->success('Fee Amount Inserted Successfully');

            return redirect()->route('fee.amount.view');
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
    public function edit($fee_category_id)
    {
        $feeCategoryAmount = FeeCategoryAmount::where('fee_category_id', $fee_category_id)->orderBy('class_id', 'asc')->get();
        // dd($data['editData']->toArray());
        $feeCategory = FeeCategory::all();
        $studentClass = StudentClass::all();
        return view('setup.fee_amount.edit_fee_amount', compact('feeCategory', 'studentClass', 'feeCategoryAmount'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $fee_category_id)
    {
        if ($request->class_id == NULL) {
            toastr()->error('An error has occurred please try again later.');

            return redirect()->route('fee.amount.edit', $fee_category_id);
        } else {

            $countClass = count($request->class_id);
            FeeCategoryAmount::where('fee_category_id', $fee_category_id)->delete();
            for ($i = 0; $i < $countClass; $i++) {
                $feeCategoryAmount = new FeeCategoryAmount();
                $feeCategoryAmount->fee_category_id = $request->fee_category_id;
                $feeCategoryAmount->class_id = $request->class_id[$i];
                $feeCategoryAmount->amount = $request->amount[$i];
                $feeCategoryAmount->save();
            } // End For Loop	 

        } // end Else
        if ($feeCategoryAmount instanceof Model) {
            toastr()->success('Fee Amount updated Successfully');

            return redirect()->route('fee.amount.view');
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
    public function Details($fee_category_id)
    {
        $feeCategoryAmount = FeeCategoryAmount::where('fee_category_id', $fee_category_id)->orderBy('class_id', 'asc')->get();

        return view('setup.fee_amount.details_fee_amount', compact('feeCategoryAmount'));
    }
}