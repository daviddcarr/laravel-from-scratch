@extends('layouts.master')

@section('content')

    <div class="col-sm-8 blog-main">
        <h2 class="blog-post-title">Create A Post</h2>

        <hr>

        <form method="POST" action="/posts">

        {{ csrf_field() }}

          <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title">
          </div>

          <div class="form-group">
            <label for="body">Body</label>
            <textarea class="form-control" id="body" name="body"></textarea>
          </div>


          <button type="submit" class="btn btn-primary">Publish</button>

        </form>
    </div>

@endsection