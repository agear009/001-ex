<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['image','category','title','slug','content'];

    public function getListPost()
    {
        $listPost = DB::table('posts')
        ->join('categories','posts.category','=','categories.id')
        ->select('posts.*','categories.category AS category_name')
        ->get();
        return $listPost;
    }
}
