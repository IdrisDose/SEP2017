<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/master.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>GoFundyMe</title>
</head>
<noscript>
    This site requires Javascript. Please enable Javascript in your browser for this site.<br/>

    Something make look broken without it, please enable it.
</noscript>
@if(Route::is('index') || Route::is('dashboard') || Route::is('admin') || Route::is('login') || Route::is('register'))
    <body class="clearfix bg-inc">
@else
    <body class="clearfix bg-inc2">
@endif
    <div class="container-fluid">
        <div class="row">
            @include('inc.navbar')
        </div>
        <div class="row row-large">
            @yield('content')
        </div>
        <div class="row">
            @include('inc.footer')
        </div>
    </div>

    @include('inc.javascript')
</body>
</html>
