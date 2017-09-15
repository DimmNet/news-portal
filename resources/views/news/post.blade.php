<div class="blog-post">
    <a href="/news/{{ $post->id }}/{{ $post->clearTitle }}">
        @if (!empty($post->image))
            <img src="{{ $post->image }}" class="img-fluid" alt="img">
        @endif
        <h3 class="blog-post-title">
            {{ $post->title }}
        </h3>
    </a>
    <p class="blog-post-meta">
        {{ $post->user->name }} -
        {{ $post->created_at->diffForHumans() }}
    </p>

    {{ $post->shortBody }}
</div>