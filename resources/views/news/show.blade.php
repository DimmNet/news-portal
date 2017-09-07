@extends ('layouts.app')

@section ('content')
    <div class="col-sm-8 blog-main">
        @if ($flash = session('message'))
            <div id='flash-message' class='alert alert-success' role='alert'>
                {{ $flash }}
            </div>
        @endif
        @if (!empty($news->image))
            <img src="{{ $news->image }}" alt="img">
        @endif
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