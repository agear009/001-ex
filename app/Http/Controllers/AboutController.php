<?php

namespace App\Http\Controllers;
//import model About
use App\Models\About;
//return type view
use Illuminate\View\View;

use Illuminate\Http\Request;

// return type redirect respone
use Illuminate\Http\RedirectResponse;
//import Facade "Storage"
use Illuminate\Support\Facades\Storage;




class AboutController extends Controller
{
    //
    public function index(): View
    {

        //get About
        //$Abouts = About::latest()->paginate(5);
        $Abouts = About::all();
        //render view About
        return view('abouts.index',["title"=>"About",'active'=>'About'],compact('Abouts'));
    }
    // untuk menampilkan form tambah data
    public function create(): view {
        return view('abouts.Create',["title"=>"Create",'active'=>'About']);

    }
    //pungsi menambahkan data
    public function store(Request $request): RedirectResponse
    {

        $this->validate($request,[

            'image' =>'required|image|mimes:jpeg,jpg,png|max:2048',
            'title' =>'required|min:5|max:255',
            'slug' =>'required|min:5|max:255',
            'content'=>'required|min:10'
        ]);
        //upload image3
        $image=$request->file('image');
        $image-> storeAs('public/Abouts', $image->hashName());
        //create About
        About::create([
            'image'=>$image->hashName(),
            'title' =>$request->slug,
            'slug'=>$request->title,
            'content'=>$request->content
        ]);
        //redirect to index
        return Redirect()->route('abouts.index',["title"=>"About",'active'=>'About'])->with(['success'=>'data success ditambahkan!']);
    }

    //function show
    public function show(string $id):view
    {

        //get pos id
        $About=About::findorFail($id);

        //render view with About
        return view('abouts.show',["title"=>"Show",'active'=>'About'],compact('About'));
    }

    public function edit(string $id):View
    {
        //get About by id
        $About=About::findOrFail($id);
        return view('abouts.edit',["title"=>"Edit",'active'=>'About'], compact('About'));

    }

    public function update(Request $request, $id): RedirectResponse

    {

        $this->validate($request,[

            'image'=>'image|mimes:jpeg,jpg,png|max:2048',
            'title' =>'required|min:3|max:255',
            'slug' =>'required|min:3|max:255',
            'content' =>'required|min:5'
        ]);
        //get About by id
        $About=About::FindOrFail($id);

        if($request->hasFile('image'))
        {
            //upload new image
            $image=$request->file('image');

            $image->storeAs('public/Abouts',$image->hashName());


            //delete old image
            Storage::delete('public/Abouts/'.$About->image);

            //update About with new image
            $About->update([

                'image' =>$image->hashName(),
                'title' =>$request->title,
                'slug' =>$request->slug,
                'content'=>$request->content
            ]);

        }
        else
        {
            $About->update([
            'title' =>$request->title,
            'slug' =>$request->slug,
            'content'=>$request->content
            ]);

        }
        return redirect()->route('abouts.index',["title"=>"About",'active'=>'About'])->with(['success'=>'data berhasil diubah!']);

    }

    public function destroy($id): RedirectResponse
    {
        //get About id
        $About=About::findOrFail($id);

        //delete image

        Storage::delete('public/Abouts/'. $About->image);

        // delete About
        $About->delete();

        //redirect to index
        return redirect()->route('abouts.index',["title"=>"About",'active'=>'About'])->with(['success'=>'data telah berhasil di delete!']);
    }
}
