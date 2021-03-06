@extends ('layouts.main')

@section ('content')
    <div class="col-sm-8 blog-main">
        @if (!empty($news->image))
            <img src="{{ $news->image }}" class="img-fluid" alt="img" title="{{ $news->title }}">
        @endif
        <h3 class="blog-post-title">
            {{ $news->title }}
        </h3>
        <p class="blog-post-meta">
            {{ $news->user->name }} -
            {{ $news->created_at->diffForHumans() }}
        </p>

        {!! \Markdown::convertToHtml($news->body) !!}

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

        @if ($news->comments->count())
            <hr>

            <div class="comments">
                <ul class="list-group">
                    @foreach ($news->comments as $comment)
                        <li class="list-group-item">
                            <strong>
                                {{ $comment->user->name }} -
                                {{ $comment->created_at->diffForHumans() }} &nbsp;
                            </strong>
                            {{ $comment->body }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (Auth::check())
            <hr>

            <form method="POST" action="{{route('comments.store', $news->id)}}">
                {{csrf_field()}}
                <div class="form-group">
                    <textarea class="form-control{{ $errors->has('comment') ? ' is-invalid' : '' }}" name="comment" placeholder="@lang('news.comment')">{{ old('comment') }}</textarea>

                    @if ($errors->has('comment'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('comment') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">@lang('news.add_comment')</button>
                </div>
            </form>
        @endif
    </div>
@endsection