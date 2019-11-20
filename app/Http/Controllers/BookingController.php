<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Chalet;
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
    public function index(Request $request)
    {
        if (!$request->user()) {
            return redirect()->route('login');
        }

        $bookings = DB::table('bookings')->paginate(10);

        return view('bookings.index',['bookingData' => $bookings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $chalet = $request->get('chalet');

        return view('bookings.create', ['chalet' => $chalet]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $chaletId = $request->get('chaletId');

        $chalet = Chalet::find($chaletId);

        $data = $request->validate([
            'firstname'=> 'required',
            'lastname'=> 'required',
            'email'=> 'required|email',
            'telephone_number'=> 'required|max:15',
            'arrival'=> 'required',
            'departure' =>'required',
            'people'=> 'required|numeric',
            'pets' => 'nullable'
        ]);

        $booking = new Booking([
            'firstname' => $request->get('firstname'),
            'lastname' => $request->get('lastname'),
            'email' => $request->get('email'),
            'telephone_number' => $request->get('telephone_number'),
            'arrival'=> $request->get('arrival'),
            'departure'=> $request->get('departure'),
            'people'=> $request->get('people'),
            'pets'=> $request->get('pets'),
            'price' => $chalet->price,
            'chalet' => $chalet->name
        ]);

        $subject = 'Bevestiginsmail';
        $view = 'confirmation_email_template';

        Mail::to($request->get('email'))->send(new ContactMail($data,$subject,$view));

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
    public function edit($id, Request $request)
    {
        if (!$request->user()) {
            return redirect()->route('login');
        }

        $booking = Booking::find($id);

        return view('bookings.edit', ['bookingData' => $booking]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!$request->user()) {
            return redirect()->route('login');
        }

        $request->validate([
            'firstname'=> 'required',
            'lastname'=> 'required',
            'email'=> 'required|email',
            'telephone_number'=> 'required|max:15',
            'arrival'=> 'required',
            'departure' =>'required',
            'people'=> 'required|numeric',
            'pets' => 'nullable'
        ]);

        $booking = Booking::find($id); 
        $booking->firstname = $request->get('firstname');
        $booking->lastname = $request->get('lastname');
        $booking->email = $request->get('email');
        $booking->telephone_number = $request->get('telephone_number');
        $booking->arrival = $request->get('arrival');
        $booking->departure = $request->get('departure');
        $booking->people = $request->get('people');
        $booking->pets = $request->get('pets');

        $booking->save();

        return redirect('/bookings')->with('gelukt!', 'Boeking is bijgewerkt');
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
        $booking = Booking::find($id);
        $booking->delete();
   
        return redirect('/bookings')->with('gelukt!', 'de boeking is succesvol verwijderd');
    }
}
