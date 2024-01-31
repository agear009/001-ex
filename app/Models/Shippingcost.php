<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Shippingcost extends Model
{
    use HasFactory;
    protected $fillable = ['id_country','cost'];


    public function getListShippingCosts()
                                        {
                                            $listshippingCosts = DB::table('shippingcosts')
                                                                    ->join('countries','shippingcosts.id_country','=','countries.id')
                                                                    ->select('shippingcosts.*','countries.country AS country_name')
                                                                    ->get();
                                            return $listshippingCosts;
                                        }
    public function getListshippingCostsById($id)
                                            {
                                            $getListshippingCostsById = DB::table('shippingcosts')
                                                                            ->join('countries','shippingcosts.id_country','=','countries.id')
                                                                            ->where('shippingcosts.id','=',$id)
                                                                            ->select('shippingcosts.*','countries.country AS country_name')
                                                                            ->get();
                                            return $getListshippingCostsById[0];
                                            }
}

