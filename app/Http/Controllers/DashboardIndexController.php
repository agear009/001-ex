<?php



namespace App\Http\Controllers;
//import Facade "Storage"
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
// return type redirect respone
use Illuminate\Http\RedirectResponse;
use App\Models\product;
use App\Models\ShoppingCart;
use App\Models\Shippingcost;
use App\Models\categoryproduct;
use App\Models\User;
use App\Models\country;
use App\Models\Transaction;
use Illuminate\View\View;

 $Countries=country::all();


class DashboardIndexController extends Controller
{

    public function index(){
        $modelShoppingCart = new ShoppingCart();
        $ShoppingCarts=$modelShoppingCart->getListshoppingCart();

        $Categoryproducts = categoryproduct::all();
        $Products = product::all();
        $Countries=country::all();
        $Transactions=Transaction::all();
       // $ShoppingCarts=ShoppingCart::all();
        $User=user::findOrFail(auth()->user()->id);
        return view('Index.Dashboard',["title"=>"home","active"=>"Login",'Countries'=>$Countries],compact('Categoryproducts','Products','User','ShoppingCarts','Transactions'));
    }

    public function show(string $id)
    {
       $product=product::findOrFail($id);
       // $product=product::findOrFail($id)->get();
        //tambah ->get(); untuk error bool $Products=product::findOrFail($id)
        $User=user::findOrFail(auth()->user()->id);
        //dd($product);

        return view('index.detail',["title"=>"Detail","active"=>"Detail"],compact('product','User'));


    }
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
        return Redirect()->route('dashboardindexs.index',["title"=>"My Order",'active'=>'Myorder'])->with(['success'=>'cart added successfully!']);
    }


    public function edit(string $id):View
    {
        $modelshoppingCartsById = new shoppingCart;
        $ShoppingCart=$modelshoppingCartsById->getListshoppingCartById($id);
        $ShippingCosts=Shippingcost::all();

        //get product by id
        //$ShoppingCart=ShoppingCart::findOrFail($id);
        return view('index.edit',["title"=>"Edit",'active'=>'myorder'], compact('ShoppingCart','ShippingCosts'));

    }


    public function update(Request $request): RedirectResponse
    {

        $stock=product::findOrFail('id_product');
        dd($stock);
        exit;
        $pengurangan=$stock-$request['amount'];
        dd($pengurangan);


        $this->validate($request,[

            'id_member' =>'required',
            'id_product' =>'required',
            'amount' =>'required',
            'price' =>'required',
            'shippingcost' =>'required',
            'status'=>'required'
        ]);

        $allprice=$request['amount']*$request['price'];
        $totalcost=$allprice+$request['shippingcost'];
        //dd($totalcost);

        //create ShoppingCart
        transaction::create([

            'id_member'=>$request->id_member,
            'id_product'=>$request->id_product,
            'allprice'=>$allprice,
            'shippingcost'=>$request->shippingcost,
            'totalcost'=>$totalcost,
            'transactionmonth'=>now(),
            'status' =>$request->status
        ]);
        //redirect to index
        return Redirect()->route('dashboardindexs.index',["title"=>"My Order",'active'=>'Myorder'])->with(['success'=>'cart added successfully!']);
    }

    public function destroy($id): RedirectResponse
    {
        //get ShoppingCart id
        $ShoppingCart=ShoppingCart::findOrFail($id);

        // delete ShoppingCart
        $ShoppingCart->delete();

        //redirect to index
        return redirect()->route('dashboardindexs.index',["title"=>"ShoppingCart",'active'=>'ShoppingCart'])->with(['success'=>'data telah berhasil di delete!']);
    }
}


