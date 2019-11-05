<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Auth;
use Illuminate\Support\Facades\Hash;
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
        //DEV PAGE

        if (!$request->user()) {
            return redirect()->route('login');
        }

        $accountId = $request->get('userId');
        $users = User::all();

        $count = 0;
        foreach ($users as $user) {
            $count++;
        }

        if ($count == 1) {
            return redirect()->back()->with('alertDanger', 'Kan de laatste gebruiker niet verwijderen');
        }

        $request->validate([
            'password'=>'required',
        ]);

        $account = User::find($accountId);
        $hasher = app('hash');
        if ($hasher->check($request->get('password'), $account->password)){
            $account->delete();
        } else {
            return redirect()->back()->with('alertDanger', 'Het ingevoerde wachtwoord is onjuist');
        }
        
        return redirect()->back();
    }

    public function editAccount(Request $request)
    {
        //DEV PAGE

        if (!$request->user()) {
            return redirect()->route('login');
        }

        $accountId = $request->get('account');
        $account = User::find($accountId);

        return view('auth.edit',['account' => $account]);
    }

    public function storeAccount(Request $request)
    {
        //DEV PAGE

        if (!$request->user()) {
            return redirect()->route('login');
        }

        $accountId = $request->get('account');
        $account = User::find($accountId);

        if ($account->name !== $request->get('name')) {
            $request->validate([
                'name' => 'unique:users|required',
            ]);

            $account->name = $request->get('name');
        }

        if ($account->email !== $request->get('email')) {
            $request->validate([
                'email' => 'unique:users|required',
            ]);

            $account->email = $request->get('email');
        }

        $account->save();

        return redirect('/account')->with('alertSuccess', 'account:'. $account->name .'is succesvol bijgwerkt');
    }


    public function changePassAccount(Request $request)
    {
        //DEV PAGE

        if (!$request->user()) {
            return redirect()->route('login');
        }

        $accountId = $request->get('account');
        $account = User::find($accountId);

        $oldPass = $request->get('oldPass');
        $newPass1 = $request->get('newPass1');
        $newPass2 = $request->get('newPass2');

        $hasher = app('hash');

        if ($hasher->check($request->get('oldPass'), $account->password)) {
            if ($newPass1 == $newPass2) {
                $account->password = Hash::make($newPass1);
                $account->save();

                return redirect('/account')->with('alertSuccess', 'account:'. $account->name .'is succesvol bijgwerkt');
            } else {
                return redirect('/account/edit?account=' . $accountId)->with('alertDanger', 'De nieuw ingevoerde wachtwoorden komen niet overeen!');
            }
        } else {
            return redirect('/account/edit?account=' . $accountId)->with('alertDanger', 'Het oude wachtwoord komt niet overeen!');
        }
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
