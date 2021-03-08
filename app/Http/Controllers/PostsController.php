<?php

namespace App\Http\Controllers;

//jangan lupa pakai ini
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
    //menampilkan form input
    public function create()
    {
        return view('posts.create');
    }
    //menyimpan data ke database
    public function store(Request $request)
    {
        $post = Post::create([
            'title' => $request -> input('title'),
            'slug' => Str::slug($request -> input('title')), 
            'content' => $request -> input('content')
        ]);

        return redirect(route('posts.index'));
    }
    //menampilkan form edit 
    public function edit(Request $request, Post $post)
    {
        return view('posts.edit', compact('post'));
    }
    //mengupdate data ke database
    public function update(Request $request, Post $post)
    {
        $post = Post::whereId($post->id)->update([
            'title' => $request->input('title'), 
            'slug' => Str::slug($request -> input('title')),
            'content' => $request->input('content')
        ]);

        return redirect(route('posts.index'));
    }

}
