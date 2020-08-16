<?php

namespace App\Http\Controllers;

use App\InterestRate;
use Illuminate\Http\Request;

class InterestRateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $interestRates = InterestRate::all();
        return view('interestRate.index', compact('interestRates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('interestRate.create');
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
            'country' => 'required',
            'interest_category' => 'required',
        ]);

        $interestRate = new InterestRate([
            'country' => $request->get('country'),
            'interest_category' => $request->get('interest_category'),
            'above_5m' => $request->get('above_5m'),
            //$data->active = $request->status;
            'below_5m' => $request->get('below_5m'),
            
        ]);

        if(isset($request->status))
        {
            $interestRate->status = 'enable';
        } else {
            $interestRate->status = 'disable';
        }
        $interestRate->save();
        return redirect('/interestRate')->with('success', 'InterestRate Saved Successfully!');
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
    public function edit($interest_rate_id)
    {
        $interestRate = InterestRate::findOrFail($interest_rate_id);
        return view('interestRate.edit', compact('interestRate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $interest_rate_id)
    {
        $request->validate([
            'country'=>'required',
            'interest_category'=>'required',
        ]);

        $interestRate = InterestRate::findOrFail($interest_rate_id);
        $interestRate->country =  $request->get('country');
        $interestRate->interest_category =  $request->get('interest_category');
        $interestRate->above_5m =  $request->get('above_5m');
        //$interestRate->above_5m = $request->status;
        $interestRate->below_5m =  $request->get('below_5m');
        if(isset($request->status))
        {
            $interestRate->status = 'enable';
        } else {
            $interestRate->status = 'disable';
        }
        $interestRate->save();
        return redirect('/interestRate')->with('success', 'InterestRate Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($interest_rate_id)
    {
        $interestRate = InterestRate::findOrFail($interest_rate_id);
        $interestRate->delete();
        return redirect('/interestRate')->with('success', 'InterestRate Deleted Successfully!');
    }
}
