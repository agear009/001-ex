<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){

        return view('login.index',['title'=>'Login','active'=>'login']);

    }

    public function autenticate(request $request)
{
        $credentials=$request->validate([

            'email'=>'required|email:dns',
            'password'=> 'required'

        ]);
        //dd('berhasil');
        //return $request()->all();
        if(Auth::attempt($credentials)){

            $request->session()->regenerate();
            $request->session()->regenerateToken();
            return redirect()->intended('/dashboard');


        }
        return back()->with('loginError','Login Filed!');

}

    public function logout(Request $request){

        Auth::logout();
        $request->session()->invalidate();
        //$request->session()->regenerateToken();

        return redirect('/');

    }

}
