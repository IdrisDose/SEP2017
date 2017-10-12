@extends('layouts.base')

@section('content')
    <!-- Begin page content -->
    <div class="container content-container">
        <div class="row">
            <div class="col-12">
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

                    <div class="col-6">
                        <div class="welcome-container">
                            <!--<div class=" center-text grad-content-bg">-->
                            @guest
                                <div class="center-text mb-3 outline-this">

                                    <h2 class="mt-2">Sign in</h2>
                                    <form class="front-page-form col-sm-9" method="POST" action="{{ route('login') }}">
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
                                <div class="col-12 pad-3">
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
                    <div class="col-6">
                        @guest
                            <div class="center-text mb-3 outline-this">

                                <h2 class="mt-2">Register New Account</h2>
                                <form class="front-page-form col-sm-9" method="POST" action="{{ route('login') }}">
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
                    </div>
                </div>
            </div>
        </div>
    @endsection
