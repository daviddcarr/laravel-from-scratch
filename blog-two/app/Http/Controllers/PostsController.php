<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

//Use for date/time conversions and whatnot.
use Carbon\Carbon;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        // $posts = Post::latest()->get();
        $posts = Post::latest()
            ->filter(request(['month', 'year']))
            ->get();

        // if ($month = request('month')) {
        //     $posts->whereMonth('created_at', Carbon::parse($month)->month);
        // }
        // if ($year = request('year')) {
        //     $posts->whereYear('created_at', $year);
        // }
        //
        // $posts = $posts->get();

        $archives = Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();

        return view('posts.index', compact('posts', 'archives'));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'title' => 'required|max:100',
            'body' => 'required'
        ]);

        //Post::create(request(['title', 'body']));
        // Post::create([
        //     'title' => request('title'),
        //     'body' => request('body'),
        //     'user_id' => auth()->id()
        // ]);

        auth()->user()->publish(
            new Post(request(['title', 'body']))
        );

        // redirect to the home page

        return redirect('/');
    }
}
