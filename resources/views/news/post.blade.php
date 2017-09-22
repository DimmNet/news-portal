<div class="blog-post">
    <a href="{{ route('news.show', [$news->id, $news->clearTitle]) }}">
        @if (!empty($post->image))
            <img src="{{ $post->image }}" class="img-fluid" alt="img" title="{{ $post->title }}">
        @endif
        <h3 class="blog-post-title">
            {{ $post->title }}
        </h3>
    </a>
    <p class="blog-post-meta">
        {{ $post->user->name }} -
        {{ $post->created_at->diffForHumans() }}
    </p>

    {!! \Markdown::convertToHtml($post->shortBody) !!}
</div>