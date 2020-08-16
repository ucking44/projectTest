<?php

namespace App\Http\Controllers;

use App\Fx;
use Illuminate\Http\Request;

class FxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Fx::all();
        return view('fx.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fx.create');
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
            'currency' => 'required',
        ]);

        $contact = new Fx([
            'country' => $request->get('country'),
            'currency' => $request->get('currency'),
            'fx_buy' => $request->get('fx_buy'),
            'fx_sell' => $request->get('fx_sell'),
            
        ]);

        if(isset($request->status))
        {
            $contact->status = 'enable';
        } else {
            $contact->status = 'disable';
        }
        $contact->save();
        return redirect('/fx')->with('success', 'FX Saved Successfully!');
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
    public function edit($fx_id)
    {
        $contact = Fx::findOrFail($fx_id);
        return view('fx.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $fx_id)
    {
        $request->validate([
            'country'=>'required',
            'currency'=>'required',
        ]);

        $contact = Fx::findOrFail($fx_id);
        $contact->country =  $request->get('country');
        $contact->currency =  $request->get('currency');
        $contact->fx_buy =  $request->get('fx_buy');
        $contact->fx_sell =  $request->get('fx_sell');
        if(isset($request->status))
        {
            $contact->status = 'enable';
        } else {
            $contact->status = 'disable';
        }
        $contact->save();
        return redirect('/fx')->with('success', 'FX Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($fx_id)
    {
        $contact = Fx::findOrFail($fx_id);
        $contact->delete();
        return redirect('/fx')->with('success', 'FX Deleted Successfully!');
    }
}
