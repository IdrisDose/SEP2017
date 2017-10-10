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

    <!-- Layout CSS -->
    <link rel="stylesheet" href="{{ asset('css/master.css') }}">

    <!-- Theme CSS for colors -->
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">

    @if(Route::is('dashboard'))
        <link rel="stylesheet" href="{{ asset('css/style.dashboard.css') }}">
    @endif
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>GoFundyMe</title>
</head>
<noscript>
    This site requires Javascript. Please enable Javascript in your browser for this site.<br/>

    Something make look broken without it, please enable it.
</noscript>
@if(Route::is('profile') || Route::is('students') || Route::is('sponsors') || Route::is('tasks'))
    <body class="clearfix bg-inc2">
@elseif(!(Route::is('dashboard')))
    <body class="clearfix bg-inc">
@else
    <body class="clearfix bg-inc">
@endif
            @if(!(Route::is('dashboard')))
                <header>
                    @include('inc.navbar')
                </header>
            @endif

            @if(Route::is('dashboard'))
                <main class="animate fadeIn light-orange">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </main>
            @else
                <main class="animate fadeIn">
                    @yield('content')


                </main>
            @endif

            @if(!(Route::is('dashboard') || Route::is('profile')))
                <footer class="footer">
                    <div class="container">
                        <div class="text-muted">&copy;GoFundy.Me 2017 | Powered by <a class="footer-link" href="https://laravel.com">Laravel</a> | <a class="footer-link" href="{{route('about')}}">About Us</a> | <a class="footer-link" href="{{route('help')}}">Help</a></div>
                    </div>
                </footer>
            @endif


    @include('inc.javascript')
</body>
</html>
