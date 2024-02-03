<?php

namespace App\Http\Controllers;
//import model Transaction
use App\Models\Transaction;
use App\Models\Category;

//return type view
use Illuminate\View\View;

use Illuminate\Http\Request;

// return type redirect respone
use Illuminate\Http\RedirectResponse;
//import Facade "Storage"
use Illuminate\Support\Facades\Storage;




class TransactionController extends Controller
{
    //
    public function index(): View
    {
        $modelTransactions = new transaction;
        $Transactions=$modelTransactions->getListTransaction();
        //$Transactions=Transaction::all();
        //get Transaction
       // $Transactions = Transaction::latest()->paginate(5);

        //render view Transaction
        return view('Transactions.Index',["title"=>"Transaction",'active'=>'Transaction'],compact('Transactions'));
    }
    // untuk menampilkan form tambah data
    public function create(): view {
        $cat=category::all();
        return view('Transactions.Create',["title"=>"Create",'active'=>'Transaction','cat'=>$cat]);

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
        //create Transaction
        Transaction::create([

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

        $modelgetListsthreeTablesById = new transaction;
        $Transaction=$modelgetListsthreeTablesById->getListsthreeTablesById($id);
        dd($Transaction);
        //get pos id
       //$Transaction=Transaction::findorFail($id);

        //render view with Transaction
        return view('Transactions.show',["title"=>"Show",'active'=>'Transaction'],compact('Transaction'));
    }

    public function edit(string $id):View
    {
        //get Transaction by id
        $modelgetListsthreeTablesById = new transaction;
        $Transaction=$modelgetListsthreeTablesById->getListsthreeTablesById($id);
        return view('Transactions.edit',["title"=>"Edit",'active'=>'Transaction'], compact('Transaction'));

    }

    public function update(Request $request, $id): RedirectResponse

    {

        $this->validate($request,[

            'image'=>'image|mimes:jpeg,jpg,png|max:2048',
            'title' =>'required|max:255',
            'slug' =>'required|max:255',
            'category' =>'required|min:2|max:255',
            'content' =>'required|min:5'
        ]);
        //get Transaction by id
        $Transaction=Transaction::FindOrFail($id);

        if($request->hasFile('image'))
        {
            //upload new image
            $image=$request->file('image');

            $image->storeAs('public/Transactions',$image->hashName());


            //delete old image
            Storage::delete('public/Transactions/'.$Transaction->image);

            //update Transaction with new image
            $Transaction->update([

                'image' =>$image->hashName(),
                'title' =>$request->slug,
                'slug' =>$request->title,
                'category' =>$request->category,
                'content'=>$request->content
            ]);

        }
        else
        {
            $Transaction->update([

            'title' =>$request->title,
            'slug' =>$request->slug,
            'category' =>$request->category,
            'content'=>$request->content
            ]);

        }
        return redirect()->route('Transactions.Index',["title"=>"Transaction",'active'=>'Transaction'])->with(['success'=>'data berhasil diubah!']);

    }

    public function destroy($id): RedirectResponse
    {
        //get Transaction id
        $Transaction=Transaction::findOrFail($id);

        //delete image

        Storage::delete('public/Transactions/'. $Transaction->image);

        // delete Transaction
        $Transaction->delete();

        //redirect to index
        return redirect()->route('Transactions.Index',["title"=>"Transaction",'active'=>'Transaction'])->with(['success'=>'data telah berhasil di delete!']);
    }
}
