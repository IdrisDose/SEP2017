@extends('layouts.base')

@section('content')

  <!-- Begin page content -->
    <div class="container">

        <div class="mt-3">
            <h1>Sponsoring Lorem Ipsum (Student ID: 1)</h1>
        </div>
        <p class="lead">Complete the form to sponsor, an email will be sent to confirm!</p>

        <form class="form-sponsor" action="dashboard-sponsor.html">
            <h2 class="form-sponsor-heading"></h2>

            <div class="form-group">
                <label for="inputSA" class="sr-only">Sponsor Amount</label>
                <input type="text" id="inputSA" class="form-control" placeholder="Enter amount you wish to donate (Sponsorship amount)(example: $35)" required="" autofocus="">
            </div>
            <div class="form-group">
                <label for="inputTask" class="sr-only">Task</label>
                <textarea class="form-control" id="inputTask" placeholder="Enter your task requirements" rows="3"></textarea>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="remember-me"> Agree to <a href="tos.html" target="_blank" required="">TOS</a>
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sponsor</button>
        </form>
    </div>

@endsection
