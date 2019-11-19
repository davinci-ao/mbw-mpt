<?php

namespace App\Http\Controllers;

use App\Chalet;
use App\Holidaypark;
use Illuminate\Http\Request;
use validate;
use DB;

class ChaletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //USER PAGE

        $id = $request->get('holidaypark');

        $chalets = Chalet::all();
        if ($id !== null) {
            $chalets = DB::table('chalets')->where('holidaypark_id', $id)->get();
        }
        
        return view('chalets.index',['chaletData' => $chalets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $holidaypark_id = 0)
    {
        //DEV PAGE

        if (!$request->user()) {
            return redirect()->route('login');
        }

        $holidayparks = Holidaypark::all();

        return view('chalets.create',['holidayparks' => $holidayparks]);
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
            'name'=>'bail|required',
            'holidaypark_id'=>'bail|required',
            'description'=>'bail|required',
            'price'=> 'bail|required|numeric',
            'country' =>'bail|required|alpha',
            'housenr'=> 'bail|required|numeric',
            'addition' => 'nullable|alpha',
            'street' =>'bail|required',
            'place' => 'bail|required'
        ]);

        $housenr = $request->get('housenr');
        $street = urlencode($request->get('street'));
        $place = urlencode($request->get('place'));

        $geocode = file_get_contents('https://geocoder.api.here.com/6.2/geocode.json?app_id=FjWI9Q1KoivEL4R45gVG&app_code=xBR0McoMEQlNkeNK8rJoJg&searchtext=' . $housenr . '+' . $street . '+' . $place);
        $geoData = json_decode($geocode,true);

        $lng = $geoData['Response']['View'][0]['Result'][0]['Location']['NavigationPosition'][0]['Longitude']; //lengtegraad
        $ltd = $geoData['Response']['View'][0]['Result'][0]['Location']['NavigationPosition'][0]['Latitude'];  // breedtegraad
            
        $longitude = $lng;
        $latitude = $ltd;

        $chalet = new Chalet([
            'name' => $request->get('name'),
            'holidaypark_id' => $request->input('holidaypark_id'),
            'description'=> $request->get('description'),
            'price'=> $request->get('price'),
            'country'=> $request->get('country'),
            'housenr'=> $request->get('housenr'),
            'addition'=> $request->get('addition'),
            'street'=> $request->get('street'),
            'place'=> $request->get('place'),
            'longitude' => $longitude,
            'latitude' => $latitude,

        ]);

        $chalet->save();
        return redirect('/holidayparks')->with('Gelukt!', 'de Chalet is toegevoegd');     
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
            'price'=> 'required|numeric',
            'country' =>'required|alpha',
            'housenr'=> 'required|numeric',
            'addition' => 'nullable|alpha',
            'street' =>'required',
            'place' => 'required'
        ]);

        $chalet = Chalet::find($id); 
        $chalet->name = $request->get('name');
        $chalet->description = $request->get('description');
        $chalet->price = $request->get('price');
        $chalet->country = $request->get('country');
        $chalet->housenr = $request->get('housenr');
        $chalet->addition = $request->get('addition');
        $chalet->street = $request->get('street');
        $chalet->place = $request->get('place');

        $housenr =  $chalet->housenr;
        $street = urlencode($chalet->street);
        $place = urlencode($chalet->place);

        $geocode = file_get_contents('https://geocoder.api.here.com/6.2/geocode.json?app_id=FjWI9Q1KoivEL4R45gVG&app_code=xBR0McoMEQlNkeNK8rJoJg&searchtext=' . $housenr . '+' . $street . '+' . $place);
        $geoData = json_decode($geocode,true);

        $lng = $geoData['Response']['View'][0]['Result'][0]['Location']['NavigationPosition'][0]['Longitude']; //lengtegraad
        $ltd = $geoData['Response']['View'][0]['Result'][0]['Location']['NavigationPosition'][0]['Latitude'];  // breedtegraad

        $longitudeNew = $lng;
        $latitudeNew = $ltd;
        
        $chalet->longitude = $longitudeNew;
        $chalet->latitude =   $latitudeNew;

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
