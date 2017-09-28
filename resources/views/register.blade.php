@extends('layouts.base')

@section('content')
  <!-- Begin page content -->
    <div class="container">

        <form class="form-register" action="home.html">
            <h2 class="form-register-heading">Please enter details to be registered</h2>

            <label for="inputFN" class="sr-only">Full Name</label>
            <input type="text" id="inputFN" class="form-control" placeholder="Full Name" required="" autofocus="">

            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" id="inputEmail" class="form-control" placeholder="Email" required="" autofocus="">

            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="">

            <div class="form-group">
                <label for="selAccType">Account Type</label>
                <select name="selAccType" class="form-control">
                    <option>Student</option>
                    <option>Sponsor</option>
                </select>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="remember-me"> Agree to <a href="tos.html" target="_blank" required="">TOS</a>
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
        </form>

    </div>
@endsection
