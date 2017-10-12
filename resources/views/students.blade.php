@extends('layouts.base')

@section('content')
  <!-- Begin page content -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 center-text">
                <div class="mt-1">
                    <h1 class="center-text">Student List</h1>
                </div>
                <p class="lead">The List of current and active students, more students will come and go as they complete and enter new degrees.</p>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h2>Active Students</h2>
                <hr class="orange">
            </div>

        @foreach($users as $user)
            <div class="col-md-3 mt-3">
                <div class="card"onclick="window.document.location='/profile/{{$user->id}}';" style="cursor: pointer;">
                    <div class="card-block">
                        <div class="col-md-12 center-text mt-3">
                            <img src="//placehold.it/100" class="img-fluid rounded-circle mb-2" alt="" title="Sponsor Image">
                        </div>
                        <hr>
                    </div>
                    <div class="card-block center-text">
                        <h3>{{$user->name}}</h3>
                        <span class="text-muted">Click to view profile</span>

                        <div class="col-md-12 mb-2">Degree: {{$user->getDegree()}}</div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
@endsection
