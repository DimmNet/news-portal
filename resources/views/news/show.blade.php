@extends ('layouts.app')

@section ('content')
    <div class="col-sm-8 blog-main">
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

        {!! $news->body !!}

        @can('update', $news)
            <form action="{{route('news.edit', $news->id)}}" method="GET">
                <button type="submit" class="btn btn-info">Редактировать</button>
            </form>
        @endcan

        @can('delete', $news)
            <form action="{{route('news.delete', $news->id)}}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-dark">Удалить</button>
            </form>
        @endcan
    </div>
@endsection