<?php

namespace App\Http\Controllers;
//import model post
use App\Models\Post;
use App\Models\Category;
//return type view
use Illuminate\View\View;

use Illuminate\Http\Request;

// return type redirect respone
use Illuminate\Http\RedirectResponse;
//import Facade "Storage"
use Illuminate\Support\Facades\Storage;




class PostController extends Controller
{
    //
    public function index(): View
    {
        $cateories=category::all();
        //get post
        $posts = post::latest()->paginate(5);
        //render view post
        return view('Posts.index',["title"=>"Post",'active'=>'Post'],compact('posts'));
    }
    // untuk menampilkan form tambah data
    public function create(): view {
        $cat=category::all();
        return view('Posts.Create',["title"=>"Create",'active'=>'Post','cat'=>$cat]);

    }
    //pungsi menambahkan data
    public function store(Request $request): RedirectResponse
    {

        $this->validate($request,[

            'image' =>'required|image|mimes:jpeg,jpg,png|max:2048',
            'category' =>'required|max:255',
            'title' =>'required|min:2|max:255',
            'slug' =>'required|min:2|max:255',
            'content'=>'required|min:10'
        ]);
        //upload image3
        $image=$request->file('image');
        $image-> storeAs('public/posts', $image->hashName());
        //create post
        Post::create([
            'image'=>$image->hashName(),
            'category'=>$request->category,
            'title'=>$request->title,
            'slug' =>$request->slug,
            'content'=>$request->content
        ]);
        //redirect to index
        return Redirect()->route('posts.index',["title"=>"Post",'active'=>'Post'])->with(['success'=>'data success ditambahkan!']);
    }

    //function show
    public function show(string $id):view
    {

        //get pos id
        $post=Post::findorFail($id);

        //render view with post
        return view('posts.show',["title"=>"Show",'active'=>'Post'],compact('post'));
    }

    public function edit(string $id):View
    {
        //get post by id
        $post=Post::findOrFail($id);
        return view('posts.edit',["title"=>"Edit",'active'=>'Post'], compact('post'));

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
        //get post by id
        $post=Post::FindOrFail($id);

        if($request->hasFile('image'))
        {
            //upload new image
            $image=$request->file('image');

            $image->storeAs('public/posts',$image->hashName());


            //delete old image
            Storage::delete('public/posts/'.$post->image);

            //update post with new image
            $post->update([

                'image' =>$image->hashName(),
                'title' =>$request->slug,
                'slug' =>$request->title,
                'category' =>$request->category,
                'content'=>$request->content
            ]);

        }
        else
        {
            $post->update([

            'title' =>$request->title,
            'slug' =>$request->slug,
            'category' =>$request->category,
            'content'=>$request->content
            ]);

        }
        return redirect()->route('posts.index',["title"=>"Post",'active'=>'Post'])->with(['success'=>'data berhasil diubah!']);

    }

    public function destroy($id): RedirectResponse
    {
        //get post id
        $post=Post::findOrFail($id);

        //delete image

        Storage::delete('public/posts/'. $post->image);

        // delete post
        $post->delete();

        //redirect to index
        return redirect()->route('posts.index',["title"=>"Post",'active'=>'Post'])->with(['success'=>'data telah berhasil di delete!']);
    }
}
