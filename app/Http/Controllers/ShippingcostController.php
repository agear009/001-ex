<?php


namespace App\Http\Controllers;
//import model country
use App\Models\shippingCost;
use App\Models\Country;
//return type view
use Illuminate\View\View;

use Illuminate\Http\Request;

// return type redirect respone
use Illuminate\Http\RedirectResponse;
//import Facade "Storage"
use Illuminate\Support\Facades\Storage;




class shippingCostController extends Controller
{
    //
    public function index(): View
    {


        //get country
      //  $shippingCosts = shippingCost::all();
        $modelSippingCosts = new shippingCost;
       $shippingCosts=$modelSippingCosts->getListshippingCosts();
       // $countrys = country::all();
        //render view country
        return view('shippingcosts.index',["title"=>"Shipping Countrys",'active'=>'Country'],compact('shippingCosts'));
    }
    // untuk menampilkan form tambah data
    public function create(): view {
        $countrys = country::all();
        return view('shippingcosts.Create',["title"=>"Create",'active'=>'Country'],compact('countrys'));

    }
    //pungsi menambahkan data
    public function store(Request $request): RedirectResponse
    {

        $this->validate($request,[


            'id_country' =>'required|max:255',
            'cost' =>'required|max:255'
        ]);

        shippingCost::create([

            'id_country'=>$request->id_country,
            'cost'=>$request->cost

        ]);
        //redirect to index
        return Redirect()->route('shippingcosts.index',["title"=>"Country",'active'=>'Country'])->with(['success'=>'Inser data success !']);
    }

    //function show
    public function show(string $id):view
    {

        //get pos id
        $shippingCosts=shippingCost::findorFail($id);

        //render view with country
        return view('shippingcosts.show',["title"=>"Show",'active'=>'Country'],compact('shippingCost'));
    }

    public function edit(string $id):View
    {
        $modelshippingCostsById = new shippingCost;
        $shippingCosts=$modelshippingCostsById->getListshippingCostsById($id);


        //get country by id
       // $shippingCost=shippingCost::findOrFail($id);


        //var_dump($shippingCosts); exit;
        return view('shippingcosts.edit',["title"=>"Edit",'active'=>'Country'], compact('shippingCosts'));

    }

    public function update(Request $request, $id): RedirectResponse

    {


        $this->validate($request,[


            'country' =>'required|max:255',
            'cost' =>'required|max:255'
        ]);
        //get country by id
        $shippingCost=shippingCost::FindOrFail($id);


            $shippingCost->update([
                'id_country'=>$request->country,
                'cost'=>$request->cost,
            ]);

        return redirect()->route('shippingcosts.index',["title"=>"Country",'active'=>'Country'])->with(['success'=>'data Update!']);

        }
    public function destroy($id): RedirectResponse
    {
        //get country id
        $shippingCosts=shippingCost::findOrFail($id);

        //delete image



        // delete country
        $shippingCosts->delete();

        //redirect to index
        return redirect()->route('shippingcosts.index',["title"=>"Shipping Country",'active'=>'Country'])->with(['success'=>'data  deleted!']);
    }
}
