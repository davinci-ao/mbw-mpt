<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use DB;

class MessageController extends Controller
{
    public function index()
    {  
        //USER PAGE

        return view('message.index');
    }

    public function store(Request $request)
    {
        //USER PAGE

        $valData = $request->validate([
            'firstname'=>'required|max:50|regex:/^[\pL\s\-]+$/u',
            'lastname'=>'required|max:50|regex:/^[\pL\s\-]+$/u',
            'email'=>'required|email',
            'phonenumber'=>'required|max:15',
            'message'=>'required|max:2000'
        ]);

        $message = new Message([
            'firstname' => $request->get('firstname'),
            'lastname' => $request->get('lastname'),
            'email' => $request->get('email'),
            'phonenumber' => $request->get('phonenumber'),
            'message' => $request->get('message')
        ]); 

        // Mail function

        Mail::to($request->get('email'))->send(new ContactMail($valData));

        $message->save(); 

        return redirect()->back()->with('alert','Uw bericht is succesvol verzonden!')->withInput();
    }

    public function list(Request $request)
    {
        //DEV PAGE

        if (!$request->user()) {
            return redirect()->route('login');
        }

        $messages = DB::table('messages')->orderBy('created_at', 'desc')->paginate(8);

        return view('message.list', [
            'messages' => $messages,
        ]);
    }

    public function destroy(Request $request)
    {
        //DEV PAGE

        if (!$request->user()) {
            return redirect()->route('login');
        }

        $id = $request->get('message');
        $message = Message::find($id);
        $message->delete();

        return redirect()->back();
    }
}
