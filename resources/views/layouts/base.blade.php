<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/master.css') }}">
</head>
<body>

  @include('inc.navbar')

  @yield('content')

  @include('inc.footer')

  @include('inc.javascript')
</body>
</html>
