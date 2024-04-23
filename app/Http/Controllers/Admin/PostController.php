<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\PostFormRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.posts.index',[
            'posts'=>Post::orderBy('created_at','desc')->paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $post=new Post();
        $post->fill([
            "title"=>'Mon premier titre',
            'description'=>"Une petite description",
            'price'=>2000,
            'sold'=>false
        ]);
        return view('admin.posts.form',[
            'post'=>$post
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostFormRequest $request)
    {

        $post=Post::create($this->extractData(new Post(),$request));

        return to_route("admin.post.index");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view("admin.posts.form",[
            'post'=>$post
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostFormRequest $request, Post $post)
    {
        $post->update($this->extractData($post,$request));
        return redirect()->route('admin.post.index',$post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        return to_route('admin.post.index')->with('success','le bien a bien été supprimé 😊.');
    }
    private function extractdata(Post $post,Request $request):array
    {
        $data=$request->validated();
        /**
         * @var UploadedFile | null $featuredImage
         */
        $featuredImage=$request->validated('featuredImage');
        if($featuredImage===null ||$featuredImage->getError()){
            return $data;
        }
        if($post->featuredImage){
            Storage::disk('public')->delete($post->featuredImage);
        }
        $data['featuredImage']=$featuredImage->store('featuredImage','public');
        return $data;
    }
}
