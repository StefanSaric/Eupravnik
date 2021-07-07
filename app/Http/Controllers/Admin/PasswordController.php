<?php

namespace App\Http\Controllers\Admin;

use App\Firm;
use App\Http\Controllers\Controller;
use App\Mail\PasswordMail;
use App\Steward;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class PasswordController extends Controller
{
    public function sendPasswordEmail (Request  $request) {

        $user = User::where('email', '=', $request->email)->first();
        //dd($user);
        if($user != null) {
            Mail::to($user->email)->send(new PasswordMail());

            Session::flash('message', 'success_'.__('Mejl za promenu lozinke je poslat!'));
            return redirect('/');
        }
        else
            return redirect()->back()->withInput()->withErrors(['email' => 'Ne postoji korisnik sa upisanom email adresom!']);

    }

    public function PasswordChange () {

        return view ('auth.passwords.reset');
    }

    public function savePassword (Request $request)
    {
        if ($request->password == $request->password_confirmation) {
            $user = User::with('roles')->where('email', '=', $request->email)->first();

            if ($user != null) {
                $user->password = bcrypt($request->input('password'));
                $user->save();
            }
            if ($user->roles->first()->name == "Firma") {
                $firm = Firm::where('user_id', '=', $user->id)->first();
                $firm->password = bcrypt($request->input('password'));
                $firm->save();
            } elseif ($user->roles->first()->name == "Upravnik")
                $steward = Steward::where('user_id', '=', $user->id)->first();
            $steward->password = bcrypt($request->input('password'));
            $steward->save();

            Session::flash('message', 'success_'.__('Vasa sifra je uspesno promenjena!'));

            return redirect('/');
        }
        else
            return redirect()->back()->withInput()->withErrors(['password' => 'Lozinke se ne poklapaju!']);
    }
}
