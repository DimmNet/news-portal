<div class="blog-masthead">
    <div class="container">
        <nav class="nav blog-nav">
            <a class="nav-link{{ route::is('home') ? ' active' : '' }}" href="{{ route('home') }}">@lang('layouts.home')</a>

            @if (Auth::check())
                <a class="nav-link{{ route::is('news.create') ? ' active' : '' }}" href="{{ route('news.create') }}">@lang('layouts.create_news')</a>
                <a class="nav-link ml-auto" href="{{ route('logout') }}">{{ Auth::user()->name }}</a>
            @else
                <a class="nav-link{{ route::is('login') ? ' active' : '' }} ml-auto" href="{{ route('login') }}">@lang('auth.entry')</a>
                <a class="nav-link{{ route::is('register') ? ' active' : '' }}" href="{{ route('register') }}">@lang('auth.register')</a>
            @endif
        </nav>
    </div>
</div>