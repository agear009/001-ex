<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = ['id_member','id_product','allprice','shippingcost','totalcost','transactionmonth','status'];

    public function getListTransaction()
    {
        $listTransactions = DB::table('transactions')
        ->join('users','transactions.id_member','=','users.id')
        ->select('transactions.*','users.name AS member_name')
        ->get();
        return $listTransactions;
    }


    public function getListsthreeTablesById($id)
    {
        $shares = DB::table('transactions')
        ->join('users','transactions.id_member' , '=','users.id' )
        ->join('products', 'transactions.id_product', '=', 'products.id')
        ->where('transactions.id','=',$id)
        ->select('transactions.*','products.image AS product_image','products.name As product_name','users.name AS user_name')
        ->get();
        return $shares;
    }

}
