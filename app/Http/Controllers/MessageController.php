<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a contact form.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {  
        if ($request->has('submitForm')) {

            $message = new Message([
                'firstname' => $request->get('firstname'),
                'lastname' => $request->get('lastname'),
                'email' => $request->get('email'),
                'phonenumber' => $request->get('phonenumber'),
                'message' => $request->get('message'),
            ]); 

            $message->save();

            return redirect()->back()->with('alert','Uw bericht is succesvol verzonden!');
        }
        return view('message.index');
    }

    /**
     * Display a list of all received messages
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $messages = Message::orderBy('created_at', 'DESC')->get();

        return view('message.list', [
            'messages' => $messages,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
