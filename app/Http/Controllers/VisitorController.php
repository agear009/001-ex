<?php

namespace App\Http\Controllers;
//import model member
use App\Models\Member;
use App\Models\country;
//return type view
use Illuminate\View\View;

use Illuminate\Http\Request;

// return type redirect respone
use Illuminate\Http\RedirectResponse;
//import Facade "Storage"
use Illuminate\Support\Facades\Storage;

//use Illuminate\Support\Facades\bcrypt;




class VisitorController extends Controller
{
    //
    public function index(): View
    {
       $modelMember = new Member;
       $members=$modelMember->getListMember();
        //get member
       // $members = Member::latest()->paginate(5);
        //render view member
        return view('members.index',["title"=>"Members",'active'=>'Member'],compact('members'));
    }
    // untuk menampilkan form tambah data
    public function create(): view {
        $countries=country::all();

        return view('members.Create',["title"=>"Create",'active'=>'Member','countries'=>$countries]);

    }
    //pungsi menambahkan data
    public function store(Request $request): RedirectResponse
    {

        $validatedData=$request->validate([

            'photo' =>'required|image|mimes:jpeg,jpg,png|max:2048',
            'name' =>'required|min:2|max:255',
            'gender'=>'required|min:1|max:20',
            'address'=>'required|min:10|max:255',
            'country_id'=>'required|min:1|max:20',
            'email'=>'required|email|unique:users',
            'phone'=>'required|min:8|max:255',
            'username'=>'required|min:2|max:255',
            'password'=>'required|min:1|max:20'
        ]);
       // $validatedData['password']=bcrypt($validatedData['password']);
         // dd($validatedData);
        //upload image3
        $password=bcrypt($request->password);
        $photo=$request->file('photo');
        $photo-> storeAs('public/members', $photo->hashName());
        //create member

       // member::Create($validatedData);

        member::create([
            'photo'=>$photo->hashName(),
            'name'=>$request->name,
            'gender'=>$request->gender,
            'address'=>$request->address,
            'country_id'=>$request->country_id,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'username'=>$request->username,
            'password'=>$password
        ]);

        //redirect to index
        return Redirect()->route('index.index',["title"=>"Members",'active'=>'Member'])->with(['success'=>'data success ditambahkan!']);
    }

    //function show
    public function show(string $id):view
    {

        //get pos id
        $member=member::findorFail($id);

        //render view with member
        return view('members.show',["title"=>"Show",'active'=>'Member'],compact('member'));
    }

    public function edit(string $id):View
    {
        //get member by id
        $member=member::findOrFail($id);
        return view('members.edit',["title"=>"Edit",'active'=>'Member'], compact('member'));

    }

    public function update(Request $request, $id): RedirectResponse

    {

        $this->validate($request,[

            'photo' =>'image|mimes:jpeg,jpg,png|max:2048',
            'name' =>'required|min:2|max:255',
            'gender'=>'required|min:1|max:20',
            'address'=>'required|min:10|max:255',
            'country_id'=>'required|min:1|max:20',
            'email'=>'required|email|unique:users',
            'phone'=>'required|min:8|max:255',
            'username'=>'required|min:2|max:255',
            'password'=>'required|min:1|max:20'
        ]);
        //get member by id
        $member=member::FindOrFail($id);

        if($request->hasFile('photo'))
        {
            //upload new image
            $photo=$request->file('photo');

            $photo->storeAs('public/members',$photo->hashName());


            //delete old image
            Storage::delete('public/members/'.$member->photo);

            //update member with new image
            $member->update([


            'photo'=>$photo->hashName(),
            'name'=>$request->name,
            'gender'=>$request->gender,
            'address'=>$request->address,
            'country_id'=>$request->country_id,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'username'=>$request->username,
            'password'=>$request->password
            ]);

        }
        else
        {
            $member->update([
                'name'=>$request->name,
                'gender'=>$request->gender,
                'address'=>$request->address,
                'country_id'=>$request->country_id,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'username'=>$request->username,
                'password'=>$request->password
            ]);

        }
        return redirect()->route('members.index',["title"=>"Members",'active'=>'Member'])->with(['success'=>'data berhasil diubah!']);

    }

    public function destroy($id): RedirectResponse
    {
        //get member id
        $member=member::findOrFail($id);

        //delete image

        Storage::delete('public/members/'. $member->photo);

        // delete member
        $member->delete();

        //redirect to index
        return redirect()->route('members.index',["title"=>"Members",'active'=>'Member'])->with(['success'=>'data telah berhasil di delete!']);
    }
}
