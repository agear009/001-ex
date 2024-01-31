<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Member extends Model
{
    use HasFactory;
    protected $fillable = [
    'name',
    'photo',
    'gender',
    'address',
    'country_id',
    'email',
    'phone',
    'username',
    'password'];
    public function getListMember()
    {
        $listMembers = DB::table('members')
        ->join('countries','members.country_id','=','countries.id')
        ->select('members.*','countries.country AS country_name')
        ->get();
        return $listMembers;
    }



}
