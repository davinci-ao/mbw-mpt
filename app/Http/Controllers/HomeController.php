<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Auth;
Use App\User;


class HomeController extends Controller
{
    public function accountAction(Request $request)
    {
        //DEV PAGE

        if (!$request->user()) {
            return redirect()->route('login');
        }

        $users = User::all();

        return view('home',['users' => $users]);
    }


    public function deleteAccount(Request $request)
    {
        $accountId = $request->get('userId');
        $users = User::all();

        $count = 0;
        foreach ($users as $user) {
            $count++;
        }

        if ($count == 1) {
            return redirect()->back()->with('lastUser', 'Kan de laatste gebruiker niet verwijderen');
        }

        $request->validate([
            'password'=>'required',
        ]);

        $account = User::find($accountId);
        $hasher = app('hash');
        if ($hasher->check($request->get('password'), $account->password)){
            $account->delete();
        } else {
            return redirect()->back()->with('wrongPass', 'Het ingevoerde wachtwoord is onjuist');
        }
        
        return redirect()->back();
    }

    public function editAccount(Request $request)
    {
        $accountId = $request->get('account');
        $account = User::find($accountId);

        return view('auth.edit',['account' => $account]);
    }

    public function storeAccount(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'unique:users|email|required'
        ]);

        $accountId = $request->get('account');
        $account = User::find($accountId);
        $account->name = $request->get('name');
        $account->email = $request->get('email');
        $account->save();

        return redirect('/home')->with('gelukt!', 'account:'. $account->name .'is succesvol bijgwerkt');

    }


    public function changePassAccount()
    {

    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        //USER PAGE

        return view('home.index');
    }
}
