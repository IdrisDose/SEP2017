@extends('layouts.base')

@section('content')
    <!-- Begin page content -->
    <div class="container content-container">

        <div class="mt-3 row justify-content-sm-center">
            <div class="col-sm-4">
                <h1 class="page-header">Welcome</h1>
            </div>
        </div>
        <div class="row">
            <div class="animated fadeIn welcome-container-1 grad-content-bg">

                <div class="justify-content-sm-center center-text mt-3 pad-4">
                    <h2>GoFundyMe</h2>
                    <p class="mt-5">
                        GoFundyMe is a crowdsourcing project aimed at connecting students and compaines togethter to help a student in need progress through their degree while also getting working that the sponsors need completed.
                    </p>
                </div>
            </div>
            <div class="animated fadeIn welcome-container-2 center-text grad-content-bg">
                @guest
                    <div class="justify-content-sm-center mt-3">

                        <h2>Sign in</h2>
                        <form class="form-signin col-sm-9" method="POST" action="{{ route('login') }}">
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



                            <button type="submit" class="btn btn-primary">
                                Login
                            </button>

                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                Forgot Your Password?
                            </a>
                            <br>
                        </form>
                        <p><a href="{{route('register')}}">Click Here</a> to create an account.</p>
                    </div>
                @endguest
                @auth
                    <h1>Welcome Back, {{ Auth::user()->name }}</h1>
                    <p>Quick DEBUG (REMOVE WHEN PUBLISH)</p>
                    <ul>
                        <li>AccName: {{Auth::user()->name}}</li>
                        <li>AccType: {{Auth::user()->acctype}}</li>
                        <li>IsActive?: {{Auth::user()->active}}</li>
                        <li>IsAdmin?: {{Auth::user()->admin}}</li>
                        <li>Degree?: {{Auth::user()->getDegree()}}</li>
                    </ul>
                @endauth
            </div>
        </div>
    </div>
@endsection
