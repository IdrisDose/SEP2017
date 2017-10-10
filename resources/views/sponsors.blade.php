@extends('layouts.base')

@section('content')
  <!-- Begin page content -->
    <div class="container">

        <div class="mt-1">
            <h1>Sponsor List</h1>
        </div>
        <p class="lead">This is the list of all current and active sponsors, keep an eye on this page as more sponsors may join!</p>

        <h2>Available Sponsors</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                        <th>Sponsor Name</th>
                        <th>Active</th>
                </thead>
                <tbody>
                    @if(count($users)>0)
                        @foreach ($users as $userObj)
                            <tr onclick="window.document.location='/profile/{{$userObj->id}}';" style="cursor: pointer;">
                                <td><a href="/profile/{{$userObj->id}}">{{$userObj->name}}</a></td>
                                <td>{{$userObj->isActive()}}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>

        </div>
    </div>
@endsection
