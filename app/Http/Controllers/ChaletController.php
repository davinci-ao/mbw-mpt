<?php

namespace App\Http\Controllers;

use App\Chalet;
use App\Holidaypark;
use Illuminate\Http\Request;
use Carbon\Carbon;
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
        $holidayparks = Holidaypark::all();

        $sort = 'name';
        $direction = 'asc';     

        //SORT

        $currentSort = 'nameAsc';
        if ($request->get('sortSelect') == 'nameAsc') {
            $sort = 'name';
            $direction = 'asc';
            $currentSort = 'nameAsc';
        }

        if ($request->get('sortSelect') == 'nameDesc') {
            $sort = 'name';
            $direction = 'desc';
            $currentSort = 'nameDesc';
        }

        if ($request->get('sortSelect') == 'priceAsc') {
            $sort = 'price';
            $direction = 'asc';
            $currentSort = 'priceAsc';
        }

        if ($request->get('sortSelect') == 'priceDesc') {
            $sort = 'price';
            $direction = 'desc';
            $currentSort = 'priceDesc';
        }

        if ($request->get('sortSelect') == 'createdAt') {
            $sort = 'created_at';
            $direction = 'desc';
            $currentSort = 'createdAt';
        }

        //FILTER

        $chalets = DB::table('chalets')->orderBy($sort, $direction)->where('holidaypark_id', $id);

        $selectedFilters = array();
        if ($request->get('submitFilters')) {
            $submitFilters = json_decode($request->get('submitFilters'), true);
            foreach ($submitFilters as $filter) {
                $chalets->where('characteristics', 'LIKE', '%' . $filter . '%');
                $selectedFilters[$filter] = $filter;
            }
        } else {
            if ($request->get('filter')) {
                foreach ($request->get('filter') as $filter) {
                    $chalets->where('characteristics', 'LIKE', '%' . $filter . '%');
                    $selectedFilters[$filter] = $filter;
                }
            }   
        }

        $encodedFilters = json_encode($selectedFilters);

        $chalets = $chalets->get();

        // SEASONS

        $now = Carbon::now();
        $year = Carbon::now()->year;

        $winter = Carbon::create($year, 12, 21);
        $lente = Carbon::create($year, 3, 21);
        $zomer = Carbon::create($year, 6, 21);
        $herfst = Carbon::create($year, 9, 21);

        //TEMP, klopte nog niet met jaarwisseling

        $periodMultiplier = 1;

        // //Herfst
        // if ($now >= $herfst && $now < $winter) {
        //     $periodMultiplier = 0.75;
        // }

        // //Winter
        // if ($now >= $winter && $now < $lente) {
        //     $periodMultiplier = 1;
        // }

        // //Lente
        // if ($now >= $lente && $now < $zomer) {
        //     $periodMultiplier = 1.5;
        // }

        // //Zomer
        // if ($now >= $zomer && $now < $herfst) {
        //     $periodMultiplier = 1.2;
        // }

        $dayPrice = null;
        foreach ($chalets as $chalet) {
            $dayPrice[$chalet->id] = $chalet->price * $periodMultiplier;
        }

        return view('chalets.index',[
            'chaletData' => $chalets, 
            'holidayparks' => $holidayparks, 
            'holidayparkid' => $id, 
            'dayPrice' => $dayPrice,
            'currentSort' => $currentSort,
            'selectedFilters' => $selectedFilters,
            'encodedFilters' => $encodedFilters
        ]);
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
            'characteristics' =>'bail|required',
            'price'=> 'bail|required|numeric',
            'country' =>'bail|required|alpha',
            'housenr'=> 'bail|required|numeric',
            'addition' => 'nullable|alpha',
            'street' =>'bail|required',
            'place' => 'bail|required',
            'photo1' => 'required',
            'photo2' => 'required',
            'photo3' => 'required',
            'photo4' => 'required'
        ]);

        $filterArray = array();
        if ($request->get('characteristics')) {
            foreach ($request->get('characteristics') as $characteristic) {
                $filterArray[$characteristic] = $characteristic;
            }
        }

        $housenr = $request->get('housenr');
        $street = urlencode($request->get('street'));
        $place = urlencode($request->get('place'));

        $geocode = file_get_contents('https://geocoder.api.here.com/6.2/geocode.json?app_id=FjWI9Q1KoivEL4R45gVG&app_code=xBR0McoMEQlNkeNK8rJoJg&searchtext=' . $housenr . '+' . $street . '+' . $place);
        $geoData = json_decode($geocode,true);

        $lng = $geoData['Response']['View'][0]['Result'][0]['Location']['NavigationPosition'][0]['Longitude']; //lengtegraad
        $ltd = $geoData['Response']['View'][0]['Result'][0]['Location']['NavigationPosition'][0]['Latitude'];  // breedtegraad
            
        $longitude = $lng;
        $latitude = $ltd;

        $image = $request->file('photo1');
        $image1 = $request->file('photo2');
        $image2 = $request->file('photo3');
        $image3 = $request->file('photo4');

        $image->move(public_path("chaletsafbeeldingen"));
        $image1->move(public_path("chaletsafbeeldingen"));
        $image2->move(public_path("chaletsafbeeldingen"));
        $image3->move(public_path("chaletsafbeeldingen"));

        $chalet = new Chalet([
            'name' => $request->get('name'),
            'holidaypark_id' => $request->input('holidaypark_id'),
            'description'=> $request->get('description'),
            'characteristics' => implode("|",$filterArray),
            'price'=> $request->get('price'),
            'country'=> $request->get('country'),
            'housenr'=> $request->get('housenr'),
            'addition'=> $request->get('addition'),
            'street'=> $request->get('street'),
            'place'=> $request->get('place'),
            'longitude' => $longitude,
            'latitude' => $latitude,
            'photo1' => $photo1 . '.png', 
            'photo2' => $photo2 . '.png',
            'photo3' => $photo3 . '.png',
            'photo4' => $photo4 . '.png'
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
            'place' => 'required',
            'photo1' =>'required|image',
            'photo2' =>'required|image',
            'photo3' =>'required|image',
            'photo4' =>'required|image'
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
        $chalet->photo1 = $request->get('photo1');
        $chalet->photo2 = $request->get('photo2');
        $chalet->photo3 = $request->get('photo3');
        $chalet->photo4 = $request->get('photo4');

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
