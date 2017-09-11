@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-8 blog-main">

            @foreach ($news as $post)
                @include ('news.post')
            @endforeach

            <nav class="blog-pagination">
                {{ $news->links() }}
            </nav>

        </div>
    </div>
</div>
@endsection
