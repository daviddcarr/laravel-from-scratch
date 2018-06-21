<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PostsController extends Controller
{
    public function index()
    {
        return view('posts.index');
    }

    public function show()
    {
        return view('posts.show');
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        // dd() = Die and Dump, dumps data onto page.

        //dd(request()->all());
        //dd(request('body'));
        //dd(request(['title', 'body']));


        // // Create a new post using the request data
        //
        // $post = new Post;
        //
        //
        // $post->title = request('title');
        //
        // $post->body = request('body');
        //
        // // save it to the DB
        //
        // $post->save();

        // Post::create([
        //     'title' => request('title'),
        //     'body' => request('body')
        // ]);

        $this->validate(request(), [
            'title' => 'required|max:100',
            'body' => 'required'
        ]);

        Post::create(request(['title', 'body']));

        // redirect to the home page

        return redirect('/');
    }
}
