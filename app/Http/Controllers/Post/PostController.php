<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;

class PostController extends Controller
{
    public function index():Paginator
    {
        return Post::paginate(25);
    }

    
}
