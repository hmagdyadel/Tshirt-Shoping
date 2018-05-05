<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>@yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{asset('fronts/css/bootstrap.min.css')}}" />
    <link href="{{asset('fronts/css/font-awesome.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::to('src/css/app.css')}}">
    @yield('styles')
</head>
<body>
<div class="container">
    @include('partials.header')
    @yield('content')
</div>
@include('partials.footer')
<script src="{{ asset('js/app.js')}}"></script>
@yield('scripts')
</body>
</html>