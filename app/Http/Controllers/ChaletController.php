<?php

namespace App\Http\Controllers;

use App\Chalet;
use Illuminate\Http\Request;
use validate;

class ChaletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //USER PAGE

        $chalets = Chalet::all();

        return view('chalets.index',['chaletData' => $chalets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //DEV PAGE

        if (!$request->user()) {
            return redirect()->route('login');
        }

        return view('chalets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //DEV PAGE

        if (!$request->user()) {
            return redirect()->route('login');
        }

        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'price'=> 'required|numeric'
        ]);

        $chalet = new Chalet([
            'name' => $request->get('name'),
            'description'=> $request->get('description'),
            'price'=> $request->get('price')

        ]);

        $chalet->save();
        return redirect('/chalets')->with('Gelukt!', 'de Chalet is toegevoegd');     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Chalet  $chalet
     * @return \Illuminate\Http\Response
     */
    public function show(Chalet $chalet, Request $request)
    {
        //DEV PAGE

        if (!$request->user()) {
            return redirect()->route('login');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chalet  $chalet
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        //DEV PAGE

        if (!$request->user()) {
            return redirect()->route('login');
        }

        $chalet = Chalet::find($id);

        return view('chalets.edit', ['chaletData' => $chalet]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chalet  $chalet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //DEV PAGE

        if (!$request->user()) {
            return redirect()->route('login');
        }

        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'price'=> 'required|numeric'
        ]);

        $chalet = Chalet::find($id); 
        $chalet->name = $request->get('name');
        $chalet->description = $request->get('description');
        $chalet->price = $request->get('price');

        $chalet->save();

        return redirect('/chalets')->with('gelukt!', 'chalet:'. $chalet->name .'is succesvol bijgwerkt');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chalet  $chalet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {   
        //DEV PAGE

        if (!$request->user()) {
            return redirect()->route('login');
        }  

        $chalet = Chalet::find($id);
        $chalet->delete();
   
        return redirect('/chalets')->with('gelukt!', 'chalet:'. $chalet->name .'is succesvol verwijderd');
    }
}
