@extends('layouts.base')

@section('content')
  <!-- Begin page content -->
  <div class="container content-container">
    <div class="row">
      <div class="col-md-12">
        <div class="welcome-container">
          <div class="justify-content-sm-center center-text">
            <h1>GoFundyMe</h2>
              <p class="mt-3">
                GoFundyMe is a crowdsourcing project aimed at connecting students and companies together to help a student in need progress through their degree while also getting working that the sponsors set forth for completion.                        </p>
              </div>
            </div>
            <hr />
          </div>
        </div>


        <div class="row mt-5">
          @guest
          <div class="col-md-5 ml-auto outline-this">
              <!--<div class=" center-text grad-content-bg">-->
                <div class="center-text mb-3 ">
                  <h2 class="mt-2">Sign in</h2>
                  <form class="front-page-form col-md-sm-9" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                      <label for="email" class="sr-only">E-Mail Address</label>

                      <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Email or Username">

                      @if ($errors->has('email'))
                        <div class="alert alert-danger" role="alert">
                          <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                          </span>
                        </div>
                      @endif
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                      <label for="password" class="sr-only">Password</label>
                      <input id="password" type="password" class="form-control" name="password" required placeholder="Password">

                      @if ($errors->has('password'))
                        <span class="help-block">
                          <strong>{{ $errors->first('password') }}</strong>
                        </span>
                      @endif

                    </div>

                    <div class="form-group">
                      <div class="">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                          </label>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">

                      <button type="submit" class="btn btn-primary">
                        Login
                      </button>
                      <br>

                    </div>
                    <div class="form-group mt-3">
                      <a class="forgot-link" href="{{ route('password.request') }}">
                        Forgot Your Password?
                      </a>
                    </div>
                  </form>
                </div>
              </div>
              <div class="col-md-1"></div>
              <div class="col-md-5 mr-auto outline-this">
                <div class="center-text mb-3">
                  <h2 class="mt-2">Register New Account</h2>
                  <form class="front-page-form" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                      <label for="name" class="sr-only">Name</label>
                      <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus placeholder="Name">
                      @if ($errors->has('name'))
                        <span class="help-block">
                          <strong>{{ $errors->first('name') }}</strong>
                        </span>
                      @endif
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                      <label for="email" class="sr-only">E-Mail Address</label>
                      <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Email">
                      @if ($errors->has('email'))
                        <span class="help-block">
                          <strong>{{ $errors->first('email') }}</strong>
                        </span>
                      @endif

                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                      <label for="password" class="sr-only">Password</label>
                      <input id="password" type="password" class="form-control" name="password" required placeholder="Password">

                      @if ($errors->has('password'))
                        <span class="help-block">
                          <strong>{{ $errors->first('password') }}</strong>
                        </span>
                      @endif
                    </div>

                    <div class="form-group">
                      <label for="password-confirm" class="sr-only">Confirm Password</label>
                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Repeat password">
                    </div>

                    <div class="form-group">
                      <label for="acctype" class="sr-only">Account Type</label>
                      <select class="form-control mdb-select" id="acctype-front" name="acctype">
                        <option value="dis" selected disabled>Account Type...</option>
                        <option value="student">Student</option>
                        <option value="sponsor">Sponsor</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" value="remember-me"> Agree to <a href="tos.html" target="_blank" required="">TOS</a>
                        </label>
                      </div>
                    </div>

                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">
                        Register
                      </button>
                    </div>

                  </form>
                </div>
              </div>
              @endguest
            <div class="welcome-container"></div>

            @auth
              <div class="col-md-12 pad-3">
                <h1 class="center-text ">Welcome Back, {{ Auth::user()->name }}</h1>
                <p class="center-text ">Quick DEBUG (REMOVE WHEN PUBLISH)</p>
                <ul class="list-group">
                  <li class="list-group-item">AccName: {{Auth::user()->name}}</li>
                  <li class="list-group-item">AccType: {{Auth::user()->acctype}}</li>
                  <li class="list-group-item">IsActive?: {{Auth::user()->isActive()}}</li>
                  <li class="list-group-item">Degree?: {{Auth::user()->getDegree()}}</li>
                </ul>
              </div>
            @endauth
          </div>
        </div>
      @endsection
