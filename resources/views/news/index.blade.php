@extends('layouts.main')

@section('content')
<div class="col-sm-8 blog-main">

    @foreach ($news as $post)
        @include ('news.post')
    @endforeach

    <nav class="blog-pagination">
        {{ $news->links('layouts.pagination') }}
    </nav>

</div>
@endsection
