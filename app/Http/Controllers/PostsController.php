<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use illuminate\Support\Str;

class PostsController extends Controller
{
    //
    public function index()
    {
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $post = Post::create([
            'title' => $request -> input('title'),
            'slug' => Str::slug($request -> input('title')), 
            'content' => $request -> input('content')
        ]);

        return redirect(route('posts.index'));
    }
}
