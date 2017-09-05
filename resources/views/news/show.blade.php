@extends ('layouts.app')

@section ('content')
    <div class="col-sm-8 blog-main">
        <img src="{{ $news->image }}" alt="img">
        <h3 class="blog-post-title">
            {{ $news->title }}
        </h3>
        <p class="blog-post-meta">
            {{ $news->user->name }} в
            {{ $news->created_at->toFormattedDateString() }}
        </p>

        {{ $news->body }}
    </div>
@endsection