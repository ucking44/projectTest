<?php

namespace App\Http\Controllers;

use App\PTA;
use Illuminate\Http\Request;

class PTAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ptas = PTA::all();
        return view('pta.index', compact('ptas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pta.create');
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
            'pta_name' => 'required',
        ]);

        $pta = new PTA([
            'country' => $request->get('country'),
            'pta_name' => $request->get('pta_name'),
            'value' => $request->get('value'),
            
        ]);

        if(isset($request->status))
        {
            $pta->status = 'enable';
        } else {
            $pta->status = 'disable';
        }
        $pta->save();
        return redirect('/pta')->with('success', 'PTA Saved Successfully!');
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
    public function edit($pta_rate_id)
    {
        $pta = PTA::findOrFail($pta_rate_id);
        return view('pta.edit', compact('pta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $pta_rate_id)
    {
        $request->validate([
            'country'=>'required',
            'pta_name'=>'required',
        ]);

        $pta = PTA::findOrFail($pta_rate_id);
        $pta->country =  $request->get('country');
        $pta->pta_name =  $request->get('pta_name');
        $pta->value =  $request->get('value');
        if(isset($request->status))
        {
            $pta->status = 'enable';
        } else {
            $pta->status = 'disable';
        }
        $pta->save();
        return redirect('/pta')->with('success', 'PTA Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($pta_rate_id)
    {
        $pta = PTA::findOrFail($pta_rate_id);
        $pta->delete();
        return redirect('/pta')->with('success', 'PTA Deleted Successfully!');
    }
}
