<div class="blog-post">
    <a href="/news/{{ $post->id }}/{{ str_replace(' ', '_', $post->title) }}">
        @if (!empty($post->image))
            <img src="{{ $post->image }}" alt="img">
        @endif
        <h3 class="blog-post-title">
            {{ $post->title }}
        </h3>
    </a>
    <p class="blog-post-meta">
        {{ $post->user->name }} в
        {{ $post->created_at->toFormattedDateString() }}
    </p>

    {{ $post->shortBody }}
</div>