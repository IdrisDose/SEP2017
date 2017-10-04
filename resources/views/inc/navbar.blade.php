<!-- Fixed navbar -->
<nav class="navbar navbar-expand-md navbar-dark nav-cust bg-dark">

    <a class="navbar-brand" href="/">GoFundyMe</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            @if(Request::is('/'))
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
            @endif

            @auth

                <li class="nav-item">
                    <a class="nav-link" href="{{route('dashboard')}}">Dashboard</a>
                </li>
            @endauth

            @if(Request::is('sponsors'))
                <li class="nav-item active">
                    <a class="nav-link " href="{{route('sponsors')}}">Sponsors <span class="sr-only">(current)</span></a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{route('sponsors')}}">Sponsors</a>
                </li>
            @endif

            @if(Request::is('students'))
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('students')}}">Students <span class="sr-only">(current)</span></a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{route('students')}}">Students</span></a>
                </li>
            @endif
        </ul>

        <ul class="nav navbar-nav">
            @if (Auth::guest())
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
                </li>
                <li>
                    <a class="nav-link" href="{{route('register')}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Register</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{route('profile')}}">
                        <i class="fa fa-user" aria-hidden="true"></i> Account
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                </li>
            @endif

        </ul>
    </div>
</nav>
