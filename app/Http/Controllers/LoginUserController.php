<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginUserController extends Controller
{
    public function index(){

        return view('login.login',['title'=>'Login','active'=>'login']);

    }

    public function autenticate(request $request)
{
        $credentials=$request->validate([

            //'email'=>'required|email:dns',
            'email'=>'required',
            'password'=> 'required'

        ]);
        //dd('berhasil');
        //return $request()->all();
        if(Auth::attempt($credentials)){

            $request->session()->regenerate();
            $request->session()->regenerateToken();
            return redirect()->intended('dashboardindexs');

        }
        return back()->with('loginError','Login Filed!');

}

    public function logout(Request $request){

        Auth::logout();
        $request->session()->invalidate();
        //$request->session()->regenerateToken();

        return redirect('/index');

    }

}
