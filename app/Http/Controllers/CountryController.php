<?php

namespace App\Http\Controllers;
//import model country
use App\Models\Country;
//return type view
use Illuminate\View\View;

use Illuminate\Http\Request;

// return type redirect respone
use Illuminate\Http\RedirectResponse;
//import Facade "Storage"
use Illuminate\Support\Facades\Storage;




class countryController extends Controller
{
    //
    public function index(): View
    {


        //get country
        //$countrys = country::latest()->paginate(5);
        $countrys = country::all();
        //render view country
        return view('countrys.index',["title"=>"Country",'active'=>'Country'],compact('countrys'));
    }
    // untuk menampilkan form tambah data
    public function create(): view {
        return view('countrys.Create',["title"=>"Create",'active'=>'Country']);

    }
    //pungsi menambahkan data
    public function store(Request $request): RedirectResponse
    {

        $this->validate($request,[


            'country' =>'required|min:2|max:255|unique:countries'
        ]);

        country::create([

            'country'=>$request->country

        ]);
        //redirect to index
        return Redirect()->route('countrys.index',["title"=>"Country",'active'=>'Country'])->with(['success'=>'data success ditambahkan!']);
    }

    //function show
    public function show(string $id):view
    {

        //get pos id
        $country=country::findorFail($id);

        //render view with country
        return view('countrys.show',["title"=>"Show",'active'=>'Country'],compact('country'));
    }

    public function edit(string $id):View
    {
        //get country by id
        $country=country::findOrFail($id);
        return view('countrys.edit',["title"=>"Edit",'active'=>'Country'], compact('country'));

    }

    public function update(Request $request, $id): RedirectResponse

    {

        $this->validate($request,[


            'country' =>'required|min:5|max:255|unique:countries'
        ]);
        //get country by id
        $country=country::FindOrFail($id);


            $country->update([
                'country'=>$request->country
            ]);

        return redirect()->route('countrys.index',["title"=>"Country",'active'=>'Country'])->with(['success'=>'data berhasil diubah!']);

        }
    public function destroy($id): RedirectResponse
    {
        //get country id
        $country=country::findOrFail($id);

        //delete image

        Storage::delete('public/countrys/'. $country->image);

        // delete country
        $country->delete();

        //redirect to index
        return redirect()->route('countrys.index',["title"=>"Country",'active'=>'Country'])->with(['success'=>'data telah berhasil di delete!']);
    }
}
