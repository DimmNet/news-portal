@extends ('layouts.main')

@section ('content')
    <div class="col-sm-8 blog-main">
        @if (!empty($news->image))
            <img src="{{ $news->image }}" class="img-fluid" alt="img">
        @endif
        <h3 class="blog-post-title">
            {{ $news->title }}
        </h3>
        <p class="blog-post-meta">
            {{ $news->user->name }} -
            {{ $news->created_at->diffForHumans() }}
        </p>

        {!! $news->body !!}

        @can('update', $news)
            <div class="d-flex justify-content-end">
                <div class="p-2">
                    <form action="{{route('news.edit', $news->id)}}" method="GET" role="form">
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-info">@lang('news.edit')</button>
                        </div>
                    </form>
                </div>
        @endcan

        @can('delete', $news)
                <div class="p-2">
                    <form action="{{route('news.delete', $news->id)}}" method="POST" role="form">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-danger">@lang('news.delete')</button>
                        </div>
                    </form>
                </div>
            </div>
        @endcan
    </div>
@endsection