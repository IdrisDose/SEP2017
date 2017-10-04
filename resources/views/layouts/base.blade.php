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
</head>
<body class="clearfix">
    <div class="container-fluid">
        <div class="row">
            @include('inc.navbar')
        </div>
        <div class="row row-large">
            @yield('content')
        </div>
        <hr>
        <div class="row">
            @include('inc.footer')
        </div>
    </div>

    @include('inc.javascript')
</body>
</html>
