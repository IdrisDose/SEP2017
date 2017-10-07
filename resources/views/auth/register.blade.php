@extends('layouts.formcontainer')
@section('formcontent')
    <form class="form-register" method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}
        <h2 class="form-register-heading center-text">Please enter details to be registered</h2>
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
            <select class="form-control" id="acctype" name="acctype">
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
@endsection
