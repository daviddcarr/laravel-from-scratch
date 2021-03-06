<div class="blog-post">
    <h2 class="blog-post-title">
        <a href="/posts/{{ $post->id }}">
            {{ $post->title }}
        </a>
    </h2>
    <p class="blog-post-meta">{{ $post->created_at->toFormattedDateString() }} | {{ $post->comments->count() }}
    @if ($post->comments->count() == 1)
        comment
    @else
        comments
    @endif
    | By {{ $post->user->name }}</p>

    {{ $post->body }}

</div><!-- /.blog-post -->
