@extends('layouts.base')

@section('content')
  <!-- Begin page content -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 center-text">
                <div class="mt-1">
                    <h1 class="center-text">Students</h1>
                </div>
                <p class="lead">The list of current and active students, more students will come and go as they complete and enter new degrees.</p>

            </div>
        </div>
        <div class="row">
        @foreach($users as $user)
            @if($user->active)
                <div class="col-md-3 mt-3 animated fadeInUp">
                    <div class="card profile-card" onclick="window.document.location='/profile/{{$user->id}}';" style="cursor: pointer;">
                        <div class="card-block">
                            <div class="col-md-12 center-text mt-3">
                                <img src="{{ asset('/uploads/avatars/' . $user->avatar) }}" height="100" width="100" class="img-fluid rounded-circle mb-2" alt="" title="Sponsor Image">
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
            @endif
        @endforeach
        </div>
    </div>
@endsection
