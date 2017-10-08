<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/master.css') }}">
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

            <header>
                @include('inc.navbar')
            </header>
            @if(Route::is('dashboard'))
                <main class="animate fadeIn bg-dark" style="height: 100vh">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </main>
            @else
                <main class="animate fadeIn">
                    @yield('content')
                </main>
            @endif

            <footer class="footer">
                <div class="container">
                    <div class="text-muted">&copy;GoFundy.Me 2017 | Powered by <a class="footer-link" href="https://laravel.com">Laravel</a> | <a class="footer-link" href="{{route('about')}}">About Us</a> | <a class="footer-link" href="{{route('help')}}">Help</a></div>
                </div>
            </footer>



    @include('inc.javascript')
</body>
</html>
