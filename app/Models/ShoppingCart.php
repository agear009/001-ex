<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ShoppingCart extends Model
{
    use HasFactory;
    protected $fillable = ['id_product','id_category','id_member','amount','price','status'];


    public function getListShoppingCart()
    {
        $listshoppingCarts = DB::table('shopping_carts')
                                ->join('products','shopping_carts.id_product','=','products.id')
                                ->select('shopping_carts.*','products.image AS products_image')
                                ->get();
        return $listshoppingCarts;
    }





    public function getListshoppingCartById($id)
    {
    $getListshoppingCartById = DB::table('shopping_carts')
                                    ->join('products','shopping_carts.id_product','=','products.id')
                                    ->where('shopping_carts.id','=',$id)
                                    ->select('shopping_carts.*','products.image AS product_image','products.name As product_name')
                                    ->get();
    return $getListshoppingCartById[0];
    }

    public function getListsthreeTablesById($id)
    {
        $shares = DB::table('shopping_carts')
        ->join('users','shopping_carts.id_member' , '=','users.id' )
        ->join('products', 'products.id', '=', 'shopping_carts.id_product')
        ->where('shopping_carts.id','=',$id)
        ->select('shopping_carts.*','products.image AS product_image','products.name As product_name','users.name AS user_name')
        ->get();
        return $shares[0];
    }


}
