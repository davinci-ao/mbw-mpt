<?php

namespace App\Http\Controllers;

use App\Holidaypark;
use Illuminate\Http\Request;

class HolidayparkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $holidayparks = Holidaypark::all();

        return view('holidayparks.index',['holidayparks' => $holidayparks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (!$request->user()) {
            return redirect()->route('login');
        }

        return view('holidayparks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$request->user()) {
            return redirect()->route('login');
        }

        $request->validate([
            'holidaypark_name'=>'required',
            'description'=>'required'
        ]);
        $holidaypark = new Holidaypark([
            'holidaypark_name' => $request->get('holidaypark_name'),
            'description'=> $request->get('description')
        ]);

        $holidaypark->save();
        return redirect('/holidayparks')->with('Gelukt!', 'het vakantiepark is toegevoegd');  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Holidaypark  $holidaypark
     * @return \Illuminate\Http\Response
     */
    public function show(Holidaypark $holidaypark)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Holidaypark  $holidaypark
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        if (!$request->user()) {
            return redirect()->route('login');
        }

        $holidaypark = Holidaypark::find($id);

        return view('holidayparks.edit', ['holidaypark' => $holidaypark]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Holidaypark  $holidaypark
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!$request->user()) {
            return redirect()->route('login');
        }

        $request->validate([
            'name'=>'required',
            'description'=>'required',
        ]);

        $holidaypark = Holidaypark::find($id); 
        $holidaypark->name = $request->get('name');
        $holidaypark->description = $request->get('description');

        $holidaypark->save();

        return redirect('/holidayparks')->with('gelukt!', 'Vakantiepark:'. $holidaypark->name .'is succesvol bijgwerkt');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Holidaypark  $holidaypark
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if (!$request->user()) {
            return redirect()->route('login');
        }  

        $holidaypark = Holidaypark::find($id);
        $holidaypark->delete();

        return redirect('/holidayparks')->with('Gelukt', 'Het vakantiepark is verwijderd!');
    }
}
