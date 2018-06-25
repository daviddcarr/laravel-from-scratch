@extends('layouts.master')

@section('content')

    <div class="col-sm-8 blog-main">
        @include('posts.post')

        <div class="comments mb-3">
            <h3>Comments:</h3>
            <ul class="list-group">
                @foreach ($post->comments as $comment)
                    <li class="list-group-item">
                        <p>{{ $comment->body }}</p>
                        <p class="blog-post-meta mb-0">{{ $comment->created_at->diffForHumans() }}</p>
                    </li>
                @endforeach
            </ul>

        </div>

        <div class="card">

            <div class="card-body">
                <form method="POST" action="/posts/{{ $post->id }}/comments">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <textarea name="body" placeholder="Your comment here..." class="form-control" required></textarea>

                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add Comment</button>
                    </div>

                </form>

                @include('partials.errors')
            </div>

        </div>

    </div>

@endsection
