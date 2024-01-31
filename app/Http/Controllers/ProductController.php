<?php
namespace App\Http\Controllers;
//import model product
use App\Models\product;
use App\Models\CategoryProduct;
//return type view
use Illuminate\View\View;

use Illuminate\Http\Request;

// return type redirect respone
use Illuminate\Http\RedirectResponse;
//import Facade "Storage"
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //
    public function index(): View
    {

        //get product
        $products = product::all();
        //render view product
        return view('products.index',["title"=>"product",'active'=>'Product'],compact('products'));
    }
    // untuk menampilkan form tambah data
    public function create(): view {
        $category_products=CategoryProduct::all();
        return view('products.Create',["title"=>"Create",'active'=>'Product','category_products'=>$category_products]);

    }
    //pungsi menambahkan data
    public function store(Request $request): RedirectResponse
    {

        $this->validate($request,[

            'image' =>'required|image|mimes:jpeg,jpg,png|max:2048',
            'category' =>'required|min:2|max:255',
            'name'=>'required|min:2|max:255',
            'price'=>'required|min:2|max:255',
            'stock'=>'required|min:1|max:255',
            'description'=>'required|max:255'
        ]);
        //upload image3
        $image=$request->file('image');
        $image-> storeAs('public/products', $image->hashName());
        //create product
        product::create([
            'image'=>$image->hashName(),
            'category'=>$request->category,
            'name'=>$request->name,
            'price'=>$request->price,
            'description'=>$request->description,
            'stock'=>$request->stock
               ]);
        //redirect to index
        return Redirect()->route('products.index',["title"=>"product",'active'=>'Product'])->with(['success'=>'data success ditambahkan!']);
    }

    //function show
    public function show(string $id):view
    {

        //get pos id
        $product=product::findorFail($id);

        //render view with product
        return view('products.show',["title"=>"Show",'active'=>'Product'],compact('product'));
    }

    public function edit(string $id):View
    {
        //get product by id
        $product=product::findOrFail($id);
        return view('products.edit',["title"=>"Edit",'active'=>'Product'], compact('product'));

    }

    public function update(Request $request, $id): RedirectResponse

    {

        $this->validate($request,[

            'image' =>'required|image|mimes:jpeg,jpg,png|max:2048',
            'category' =>'required|min:2|max:255',
            'name'=>'required|min:2|max:255',
            'price'=>'required|min:2|max:255',
            'stock'=>'required|min:1|max:255',
            'description'=>'required|min:0|max:255'
        ]);
        //get product by id
        $product=product::FindOrFail($id);

        if($request->hasFile('image'))
        {
            //upload new image
            $image=$request->file('image');

            $image->storeAs('public/products',$image->hashName());


            //delete old image
            Storage::delete('public/products/'.$product->image);

            //update product with new image
            $product->update([
                'image'=>$image->hashName(),
                'category'=>$request->category,
                'name'=>$request->name,
                'price'=>$request->price,
                'stock'=>$request->stock,
                'description'=>$request->description
            ]);

        }
        else
        {
            $product->update([
                'category'=>$request->category,
                'name'=>$request->name,
                'price'=>$request->price,
                'stock'=>$request->stock,
                'description'=>$request->description
            ]);

        }
        return redirect()->route('products.index',["title"=>"product"])->with(['success'=>'data berhasil diubah!']);

    }

    public function destroy($id): RedirectResponse
    {
        //get product id
        $product=product::findOrFail($id);

        //delete image

        Storage::delete('public/products/'. $product->image);

        // delete product
        $product->delete();

        //redirect to index
        return redirect()->route('products.index',["title"=>"product",'active'=>'Product'])->with(['success'=>'data telah berhasil di delete!']);
    }
}
