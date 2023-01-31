<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;
use Illuminate\Pagination\Paginator;

class PageController extends Controller
{
    public function posts()
    { Paginator::useBootstrap();

        return view('posts', [
            'posts' => Post::with('user')->latest()->Paginate(5)
        ]);
	}

    


    public function post(Post $post)
    {
        return view('post', ['post' => $post]);
    }
}
