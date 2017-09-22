@extends ('layouts.main')

@section ('content')
    <div class="col-sm-8 blog-main">
        <h1>
            @lang('news.edit_news')
        </h1>

        <hr>

        <form method="POST" action="{{ route('news.update', $news->id) }}" role="form">
            {{csrf_field()}}

            <div class="form-group">
                <label for="title">@lang('news.title')</label>

                <input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" id="title" name="title" value="{{ old('title') ?: $news->title }}">

                @if ($errors->has('title'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="image">@lang('news.image')</label>

                <input type="text" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" id="image" name="image" value="{{ old('image') ?: $news->image }}">

                @if ($errors->has('image'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('image') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="body">@lang('news.body')</label>

                <textarea class="form-control{{ $errors->has('body') ? ' is-invalid' : '' }}" id="body" name="body">{{ old('body') ?: $news->body }}</textarea>

                @if ($errors->has('body'))
                    <span class="invalid-feedback">
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