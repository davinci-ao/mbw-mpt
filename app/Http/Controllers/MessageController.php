<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use DB;

class MessageController extends Controller
{
    public function index(Request $request)
    {  
        //USER PAGE

        if ($request->has('submitForm')) {

            $request->validate([
                'firstname'=>'required|max:100|alpha',
                'lastname'=>'required|max:100|alpha',
                'email'=>'required|email',
                'phonenumber'=>'required|max:15',
                'message'=>'required|max:2000',
            ]);

            $message = new Message([
                'firstname' => $request->get('firstname'),
                'lastname' => $request->get('lastname'),
                'email' => $request->get('email'),
                'phonenumber' => $request->get('phonenumber'),
                'message' => $request->get('message'),
            ]); 

            $message->save();

            // Mail function

            return redirect()->back()->with('alert','Uw bericht is succesvol verzonden!');
        }
        return view('message.index');
    }

    public function list()
    {
        //DEV PAGE

        $messages = DB::table('messages')->orderBy('created_at', 'desc')->paginate(8);

        return view('message.list', [
            'messages' => $messages,
        ]);
    }

    public function destroy(Request $request)
    {
        //DEV PAGE

        $id = $request->get('message');
        $message = Message::find($id);
        $message->delete();

        return redirect()->back();
    }
}
