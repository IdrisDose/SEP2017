@extends('layouts.base')
@section('content')

    {{-- Form not needed replaced with better one
    <form class="form-signin col-sm-9" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
        <h2 class="form-signin-heading center-text ">Sign in here to access your account</h2>
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



        <button type="submit" class="btn btn-primary pull-right">
            Login
        </button>

        <a class="btn btn-link" href="{{ route('password.request') }}">
            Forgot Your Password?
        </a>

    </form>
    --}}
    <div class="container">
        <div class="row">
            <div class="col-md-5 mt-5 mx-auto outline-this animated bounceIn">
                <!--<div class=" center-text grad-content-bg">-->
                <div class="center-text mb-3">
                    <h2 class="mt-2">Sign in</h2>
                    <form class="custom-form col-md-sm-9" method="POST" action="{{ route('login') }}">
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
        </div>
    </div>
@endsection
