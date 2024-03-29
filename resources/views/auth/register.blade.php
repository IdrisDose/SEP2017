@extends('layouts.base')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto mt-5 outline-this animated fadeIn">
                <div class="center-text mb-3 ">
                    <h2 class="mt-2">Register New Account</h2>
                    <form class="custom-form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('fname')||$errors->has('lname') ? ' has-error' : '' }}">
                            <label for="name" class="sr-only">Name</label>
                            <div class="input-group">
                                <input id="fname" type="text" class="form-control col-md-5" name="fname" value="{{ old('fname') }}" required autofocus placeholder="First Name">
                                <span class="col-md-1"></span>
                                <input id="lname" type="text" class="form-control col-md-6 " name="lname" value="{{ old('lname') }}" required autofocus placeholder="Last Name">
                            </div>
                            @if ($errors->has('fname')||$errors->has('fname'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('fname') }}{{ $errors->first('lname') }}</strong>
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
                        <input type="hidden" name="aboutme" value="New User">
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
        </div>
    </div>
@endsection
