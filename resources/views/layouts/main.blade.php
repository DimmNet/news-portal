<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="../../favicon.ico">

    <title>{{ config('app.name', 'Новости от Дмитрия Кругового') }}</title>

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  </head>

  <body>

    @include ('layouts.nav')
    
    @if ($flash = session('message'))
        <div id='flash-message' class='alert alert-success' role='alert'>
            {{ $flash }}
        </div>
    @endif

    @include ('layouts.header')

    <div class="container">

      <div class="row">

        @yield ('content')

        @include ('layouts.sidebar')

      </div><!-- /.row -->

    </div><!-- /.container -->

    @include ('layouts.footer')
  </body>
</html>
