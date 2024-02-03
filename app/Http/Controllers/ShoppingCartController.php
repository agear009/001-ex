<?php

namespace App\Http\Controllers;
//import model ShoppingCart
use App\Models\ShoppingCart;
use App\Models\Category;

//return type view
use Illuminate\View\View;

use Illuminate\Http\Request;

// return type redirect respone
use Illuminate\Http\RedirectResponse;
//import Facade "Storage"
use Illuminate\Support\Facades\Storage;




class ShoppingCartController extends Controller
{
    //
    public function index(): View
    {
        $modelShoppingCart = new ShoppingCart();
        $ShoppingCarts=$modelShoppingCart->getListshoppingCart();

        //$ShoppingCarts=ShoppingCart::all();
        //get ShoppingCart
       // $ShoppingCarts = ShoppingCart::latest()->paginate(5);

        //render view ShoppingCart
        return view('ShoppingCarts.Index',["title"=>"ShoppingCart",'active'=>'ShoppingCart'],compact('ShoppingCarts'));
    }
    // untuk menampilkan form tambah data
    public function create(): view {
        $cat=category::all();
        return view('ShoppingCarts.Create',["title"=>"Create",'active'=>'ShoppingCart','cat'=>$cat]);

    }
    //pungsi menambahkan data
    public function store(Request $request): RedirectResponse
    {

        $this->validate($request,[


            'id_product' =>'required',
            'id_category' =>'required',
            'id_member' =>'required',
            'amount' =>'required',
            'price' =>'required',
            'status'=>'required'
        ]);
       // dd($request);
        //create ShoppingCart
        ShoppingCart::create([

            'id_product'=>$request->id_product,
            'id_category'=>$request->id_category,
            'id_member'=>$request->id_member,
            'amount'=>$request->amount,
            'price'=>$request->price,
            'status' =>$request->status
        ]);
        //redirect to index
        return Redirect()->route('index.Dashboard',["title"=>"My Order",'active'=>'Myorder'])->with(['success'=>'cart added successfully!']);
    }

    //function show
    public function show(string $id):view
    {

        //get pos id
        //$ShoppingCart=ShoppingCart::findorFail($id);
        $modelgetListgetListshoppingCartById = new shoppingCart;
        $ShoppingCart=$modelgetListgetListshoppingCartById->getListshoppingCartById($id);

        //render view with ShoppingCart
        return view('ShoppingCarts.show',["title"=>"Show",'active'=>'ShoppingCart'],compact('ShoppingCart'));
    }

    public function edit(string $id):View
    {
        //get ShoppingCart by id
        //$ShoppingCart=ShoppingCart::findOrFail($id);
        $modelgetListsthreeTablesById = new shoppingCart;
        $ShoppingCart=$modelgetListsthreeTablesById->getListsthreeTablesById($id);
       // dd($ShoppingCart);
        return view('ShoppingCarts.edit',["title"=>"Edit",'active'=>'ShoppingCart'], compact('ShoppingCart'));

    }

    public function update(Request $request, $id): RedirectResponse

    {

        $this->validate($request,[

            'status' =>'required'
        ]);
        //get ShoppingCart by id
        $ShoppingCart=ShoppingCart::FindOrFail($id);


            $ShoppingCart->update([


            'status'=>$request->status
            ]);


        return redirect()->route('shoppingcarts.index',["title"=>"ShoppingCart",'active'=>'ShoppingCart'])->with(['success'=>'data berhasil diubah!']);

    }

    public function destroy($id): RedirectResponse
    {
        //get ShoppingCart id
        $ShoppingCart=ShoppingCart::findOrFail($id);

        //delete image

        Storage::delete('public/ShoppingCarts/'. $ShoppingCart->image);

        // delete ShoppingCart
        $ShoppingCart->delete();

        //redirect to index
        return redirect()->route('shoppingcarts.index',["title"=>"ShoppingCart",'active'=>'ShoppingCart'])->with(['success'=>'deleted !']);
    }
}
