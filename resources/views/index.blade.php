@extends('layouts.base')

@section('content')
    <!-- Begin page content -->
    <div class="container content-container">

        @guest
            <div class="row mt-5">
                <div class="col-md-5 ml-auto animated slideInLeft">
                    <div class="welcome-container">
                        <div class="justify-content-sm-center center-text">
                            <h1>GoFundyMe</h2>
                            <p class="mt-3">
                                GoFundyMe is a crowd-sourcing project aimed at connecting businesses and students with the aim of assisting the student with financial support and progress through their degree whilest getting work that their sponsors set forth for completion.
                            </p>
                        </div>
                    </div>
                </div>

                @if(Agent::isDesktop())
                <div class="col-md-1">
                        <div style="border-right:1px solid #bdbdbd; height: calc(100%)"></div>
                </div>
                @endif
                <div class="col-md-5 mr-auto animated slideInRight">
                    <div class="center-text mb-3 ">
                        <h2 class="mt-2">Register New Account</h2>
                        <form class="custom-form" method="POST" action="{{ route('register') }}">
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
                            <input type="hidden" name="aboutme" value="New User">

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        @endguest

        @auth
            <div class="row">
                <div class="col-md-8 pad-3 animated slideInUp mx-auto">
                    <h1 class="center-text ">Welcome Back, {{ Auth::user()->name }}</h1>
                    <p class="center-text ">Quick DEBUG (REMOVE WHEN PUBLISH)</p>
                    <ul class="list-group">
                        <li class="list-group-item">AccName: {{Auth::user()->name}}</li>
                        <li class="list-group-item">AccType: {{Auth::user()->acctype}}</li>
                        <li class="list-group-item">IsActive?: {{Auth::user()->isActive()}}</li>
                        <li class="list-group-item">Degree?: {{Auth::user()->getDegree()}}</li>
                    </ul>
                </div>
            </div>
        @endauth
    </div>
@endsection
