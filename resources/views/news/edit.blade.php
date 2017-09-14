@extends ('layouts.app')

@section ('content')
    <div class="col-sm-8 blog-main">
        <h1>
            @lang('news.edit_news')
        </h1>

        <hr>

        <form method="POST" action="{{ route('news.update', $news->id) }}">
            {{csrf_field()}}

            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                <label for="title">@lang('news.title')</label>

                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') ?: $news->title }}">

                @if ($errors->has('title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                <label for="image">@lang('news.image')</label>

                <input type="text" class="form-control" id="image" name="image" value="{{ old('image') ?: $news->image }}">

                @if ($errors->has('image'))
                    <span class="help-block">
                        <strong>{{ $errors->first('image') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                <label for="body">@lang('news.body')</label>

                <textarea class="form-control" id="body" name="body">{{ old('body') ?: $news->body }}</textarea>

                @if ($errors->has('body'))
                    <span class="help-block">
                        <strong>{{ $errors->first('body') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">@lang('news.save')</button>
            </div>
        </form>
    </div>
@endsection