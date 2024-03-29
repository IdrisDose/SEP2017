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
    <link href="{{ asset('css/summernote-bs4.css') }}" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script>
    <!-- Layout CSS -->
    <link rel="stylesheet" href="{{ asset('css/master.css') }}">
    <!-- Theme CSS for colors -->
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">

    @if(Route::is('dashboard'))
        <link rel="stylesheet" href="{{ asset('css/style.dashboard.css') }}">
    @endif
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>GoFundyMe</title>
    <!-- include summernote css/js-->


    @include('inc.javascript')
    <script src="{{asset('js/summernote-bs4.min.js')}}"></script>
</head>
    <noscript>
        This site requires Javascript. Please enable Javascript in your browser for this site.<br/>

        Something make look broken without it, please enable it.
    </noscript>



    <body class="clearfix db-bg">
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
            @if(Route::is('index') && Agent::isDesktop())
                <div class="orange-circle-contain animated fadeIn">
                    <div class="orange-circle" style="opacity: 1;"></div>
                </div>
            @endif
            <main class="animate fadeIn mb-1">
                <div class="content-wrapper ">
                    @yield('content')
                </div>

            </main>
        @endif

        @if(!(Route::is('dashboard') || Route::is('profile')) && Agent::isDesktop())
            <footer class="footer fixed-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-muted pull-right">&copy;GoFundy.Me 2017 | Powered by <a class="footer-link" href="https://laravel.com">Laravel</a> | <a class="footer-link" href="{{route('about')}}">About Us</a> | <a class="footer-link" href="{{route('help')}}">Help</a></div>
                        </div>
                    </div>
                </div>
            </footer>
        @endif

        <script src="{{asset('js/custom.js')}}" type="text/javascript" ></script>
    </body>
</html>
