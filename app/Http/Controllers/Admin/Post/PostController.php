<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;

class PostController extends Controller
{
    public function index():View
    {
        $posts=Post::paginate(25);
        return view('admin.post.index',[
            'posts'=>$posts
        ]);
    }

    public function create():View
    {
        return view('admin.post.new');
    }
    public function store(Request $request){
        $post=Post::create([
            'title'=>$request->input('title'),
            'description'=>$request->input('description'),
            'price'=>$request->input('price'),
            'featuredImage'=>'',
            'sold'=>false
        ]);
       return redirect()->route('admin.post.index',[
        'post'=>$post
       ]);
    }
    public function update(){
        //
    }
    public function delete(){
        //
    }
}
