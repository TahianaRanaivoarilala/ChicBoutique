@extends('admin.layouts.master')
@section('title',$post->exists? "Edit a product":"Create a  new product")

@section('content')
    <h2 class="text-4xl font-bold dark:text-white py-6 prose prose-slate">@yield('title')</h2>
    <form action="{{route($post->exists? "admin.post.update":"admin.post.store",$post)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method($post->exists? "put":"post")
            <div class="mb-6">
                @include('shared.input',['name'=>'title','id'=>'title','class'=>'block mt-1 w-full','type'=>'text','value'=>$post->title])
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                @include('shared.input',['name'=>'description','id'=>'description','class'=>'block mt-1 w-full ','type'=>'textarea','value'=>$post->description])
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                @include('shared.input',['name'=>'price','id'=>'price','class'=>'block mt-1 w-full','type'=>'number','value'=>$post->price])
                <x-input-error :messages="$errors->get('price')" class="mt-2" />
                @include('shared.input',['name'=>'featuredImage','id'=>'featuredImage','class'=>'block mt-1 w-full','type'=>'file'])
                <x-input-error :messages="$errors->get('featuredImage')" class="mt-2" />
                @include('shared.checkbox',['name'=>'sold','value'=>$post->sold])
                <x-input-error :messages="$errors->get('sold')" class="mt-2" />
            </div>
           <div class="py-4">
                <button  class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">
                    @if ($post->exists)
                        Modify
                    @else
                        Create
                    @endif
                </button>
           </div>


    </form>
@endsection
