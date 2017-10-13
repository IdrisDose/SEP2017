@extends('layouts.base')

@section('content')
    <!-- Begin page content -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 center-text">
                <div class="mt-1">
                    <h1 class="center-text">Sponsor List</h1>
                </div>
                <p class="lead">This is the list of all current and active sponsors, keep an eye on this page as more sponsors may join!</p>
            </div>
        </div>
        <div class="row ">
            <div class="col-md-12">
                <h2 class="">Active Sponsors</h2>
                <hr class="orange">
            </div>

            @if(count($users)>0)
                @foreach ($users as $userObj)
                    <div class="col-md-3 mt-3">
                        <div class="card" onclick="window.document.location='/profile/{{$userObj->id}}';" style="cursor: pointer;">
                            <div class="card-block">
                                <div class="col-md-12 center-text  mt-4">
                                    <img src="//placehold.it/100" class="img-fluid rounded-circle mb-2" alt="" title="Sponsor Image">
                                </div>
                                <hr>
                            </div>
                            <div class="card-block center-text">
                                <h3>{{$userObj->name}}</h3>
                                <span class="text-muted">Click to view profile</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

    </div>
@endsection
