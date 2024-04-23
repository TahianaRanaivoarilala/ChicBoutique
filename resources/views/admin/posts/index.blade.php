@extends('admin.layouts.master')
@section('title','Tous les produits')

@section('content')
<div class="p-6 py-6 flex justify-between">
    <h2 class="text-4xl font-bold dark:text-white py-6">@yield('title')</h2>
    <div class="row">
        <a href="{{route("admin.post.create")}}" class=" order-last text-white bg-blue-700  hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-800 focus:outline-none dark:focus:ring-blue-800">
            Créer un produit
       </a>
    </div>
</div>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Product name
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
                <th scope="col" class="px-6 py-3">
                    Category
                </th>
                <th scope="col" class="px-6 py-3">
                    sold
                </th>
                <th scope="col" class="px-6 py-3">
                    Featured Image
                </th>

                <th scope="col" class="px-6 py-3  text-center">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$post->title}}
                    </th>
                    <td class="px-6 py-4">
                        {{$post->price}}
                    </td>
                    <td class="px-6 py-4">
                        Sac à main
                    </td>
                    <td class="px-6 py-4">
                        @if ($post->sold===1)
                        <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">Selled 😉</span>

                        @else
                        <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">Not selled 😢</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                    @if ($post->featuredImage)
                        <img src="{{$post->urlFeaturedImage()}}" alt="sary" style="width:60px;height:60px; object-fit:cover;">
                    @endif
                    </td>

                    <td class="px-6 py-4">
                      <div class="flex justify-end">
                        <a class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" href="{{route('admin.post.edit',$post)}}">Edit</a>
                        <form action="{{route('admin.post.destroy',$post)}}" method="post">
                            @csrf
                            <button class="text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Delete</button>
                        </form>
                      </div>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
