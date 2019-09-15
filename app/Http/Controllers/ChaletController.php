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
        $chalets = Chalet::all();

        return view('chalets.index',['chaletData' => $chalets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
       $request->validate([
            'name'=>'required',
            'description'=>'required',
            'price'=> 'required'
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
    public function show(Chalet $chalet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chalet  $chalet
     * @return \Illuminate\Http\Response
     */
    public function edit(Chalet $chalet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chalet  $chalet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chalet $chalet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chalet  $chalet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chalet $chalet)
    {
        //
    }
}
