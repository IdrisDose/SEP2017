
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark orange accent-2">
        <div class="container">
          <a class="navbar-brand animated pulse" onmouseover="animatedLogo(true)" onmouseout="animatedLogo(false)" href="/"><div class="fundyLogo">G</div> GoFundyMe</a>
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
                          <a class="nav-link" href="{{route('students')}}">Students</a>
                      </li>
                  @endif

                  @if(Request::is('tasks'))
                      <li class="nav-item active">
                          <a class="nav-link" href="{{route('tasks')}}">Tasks <span class="sr-only">(current)</span></a>
                      </li>
                  @else
                      <li class="nav-item">
                          <a class="nav-link" href="{{route('tasks')}}">Tasks </a>
                      </li>
                  @endif
                  @auth
                      @if(Request::is('dashboard'))
                          <li class="nav-item active">
                              <a class="nav-link" href="{{route('dashboard',Auth::user()->acctype)}}">Dashboard</a>
                          </li>
                      @else
                          <li class="nav-item">
                              <a class="nav-link" href="{{route('dashboard',Auth::user()->acctype)}}">Dashboard</a>
                          </li>
                      @endif
                  @endauth
              </ul>

              <ul class="nav navbar-nav">
                  @if (Auth::guest())
                      <li class="nav-item">
                          <a class="nav-link" href="{{route('login')}}"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="{{route('register')}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Register</a>
                      </li>
                  @else
                      <!-- Dropdown -->
                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i> {{Auth::user()->name}}</a>
                          <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                              <a class="dropdown-item custdp" href="{{route('profile',Auth::user()->id)}}">Profile</a>
                              <a class="dropdown-item custdp" href="{{route('dashboard',Auth::user()->acctype)}}">Dashboard</a>
                              <!-- <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="#">Something else here</a> -->
                          </div>
                      </li>

                      @if(Auth::user()->isAdmin())
                          @if(Request::is('admin'))
                              <li class="nav-item active">
                                  <a class="nav-link" href="{{route('admin')}}"><i class="fa fa-lock" aria-hidden="true"></i> Admin</a>
                              </li>
                          @else
                              <li class="nav-item">
                                  <a class="nav-link" href="{{route('admin')}}"><i class="fa fa-lock" aria-hidden="true"></i> Admin</a>
                              </li>
                          @endif
                      @endif

                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                      </li>
                  @endif

              </ul>
          </div>
        </div>
    </nav>
