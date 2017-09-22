@extends('layouts.main')

@section('content')
<div class="col-sm-8 blog-main">
    <div class="card">
        <div class="card-header">@lang('auth.password_reset')</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="email" class="col-md-4 form-control-label">@lang('auth.email_enter')</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            @lang('auth.password_reset_send_link')
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
