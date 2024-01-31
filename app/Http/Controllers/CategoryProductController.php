<?php

namespace App\Http\Controllers;
//import model categoryproduct
use App\Models\categoryproduct;
//return type view
use Illuminate\View\View;

use Illuminate\Http\Request;

// return type redirect respone
use Illuminate\Http\RedirectResponse;





class categoryproductController extends Controller
{
    //
    public function index(): View
    {

        //get categoryproduct
        $categoryproducts = categoryproduct::latest()->paginate(5);
        //render view categoryproduct
        return view('categoryproducts.index',["title"=>"Category",'active'=>'CategoryProduct'],compact('categoryproducts'));
    }
    // untuk menampilkan form tambah data
    public function create(): view {
        return view('categoryproducts.Create',["title"=>"Create",'active'=>'CategoryProduct']);

    }
    //pungsi menambahkan data
    public function store(Request $request): RedirectResponse
    {

        $this->validate($request,[


            'name' =>'required|min:2|max:255'
        ]);

        categoryproduct::create([

            'name'=>$request->name

        ]);
        //redirect to index
        return Redirect()->route('categoryproducts.index',["title"=>"Category",'active'=>'CategoryProduct'])->with(['success'=>'data success ditambahkan!']);
    }

    //function show
    public function show(string $id):view
    {

        //get pos id
        $categoryproduct=categoryproduct::findorFail($id);

        //render view with categoryproduct
        return view('categoryproducts.show',["title"=>"Show",'active'=>'CategoryProduct'],compact('categoryproduct'));
    }

    public function edit(string $id):View
    {
        //get categoryproduct by id
        $categoryproduct=categoryproduct::findOrFail($id);
        return view('categoryproducts.edit',["title"=>"Edit",'active'=>'CategoryProduct'], compact('categoryproduct'));

    }

    public function update(Request $request, $id): RedirectResponse

    {

        $this->validate($request,[


            'name' =>'required|min:2|max:255'
        ]);
        //get categoryproduct by id
        $categoryproduct=categoryproduct::FindOrFail($id);


            $categoryproduct->update([
                'name'=>$request->name
            ]);

        return redirect()->route('categoryproducts.index',["title"=>"Category",'active'=>'CategoryProduct'])->with(['success'=>'data berhasil diubah!']);

        }
    public function destroy($id): RedirectResponse
    {
        //get categoryproduct id
        $categoryproduct=categoryproduct::findOrFail($id);

        // delete categoryproduct
        $categoryproduct->delete();

        //redirect to index
        return redirect()->route('categoryproducts.index',["title"=>"Category",'active'=>'CategoryProduct'])->with(['success'=>'data telah berhasil di delete!']);
    }
}
