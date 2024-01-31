<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    //["title"=>"Register","active"=>"index"]
    public function index(){
        return view('register.create',["title"=>"Register","active"=>"index"]);
    }

    public function store(request $request){
        //return request()->all();
       $this->validate($request,[

            'level' =>'required|max:255',
            'name'=>'required|min:2|max:255',
            'email'=>'required|min:2|max:255',
            'password'=>'required|min:8|max:255',
            //'confrimpassword'=>'required|max:255'

        ]);
        //dd('data berhasil',$request);

        user::create([

            'level'=>$request->level,
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password
               ]);
             //  $request->session()->Flash('success','Registration successfull! please Login');
               return redirect('/')->with('success','Registration successfull! please Login');

    }
}
