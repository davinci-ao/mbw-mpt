<?php

namespace App\Http\Controllers;

use App\Booking;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use DB;
use validate;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $bookings = DB::table('bookings')->paginate(10);

        return view('bookings.index',['bookingData' => $bookings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bookings.create');
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
            'check_in'=>'required',
            'check_out'=>'required',
            'arrival'=> 'required',
            'departure' =>'required',
            'people'=> 'required|numeric',
            'pets' => 'nullable',
            'price' =>'required',
            'chalet' => 'required'
        ]);

        $booking = new Booking([
            'check_in' => $request->get('check_in'),
            'check_out'=> $request->get('check_out'),
            'arrival'=> $request->get('arrival'),
            'departure'=> $request->get('departure'),
            'people'=> $request->get('people'),
            'pets'=> $request->get('pets'),
            'price'=> $request->get('price'),
            'chalet'=> $request->get('chalet'),
        ]);

        //mail

        $data = array(
            'check_in' => $request->get('check_in'),
            'check_out'=> $request->get('check_out'),
            'arrival'=> $request->get('arrival'),
            'departure'=> $request->get('departure'),
            'people'=> $request->get('people'),
            'pets'=> $request->get('pets'),
            'price'=> $request->get('price'),
            'chalet'=> $request->get('chalet'),
        );

        Mail::to($request->get('email'))->send(new ContactMail($data));

        $booking->save();
        return redirect('/chalets')->with('Gelukt!', 'de boeking is toegevoegd');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (!$request->user()) {
            return redirect()->route('login');
        }  

        $id = $request->get('booking');
        $booking= Booking::find($id);
        $booking->delete();

        return redirect()->back();
    }
}
