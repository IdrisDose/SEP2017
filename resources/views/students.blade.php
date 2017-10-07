@extends('layouts.base')

@section('content')
  <!-- Begin page content -->
    <div class="container">

        <div class="mt-3">
            <h1>Student List</h1>
        </div>
        <p class="lead">The List of current and active students, more students will come and go as they complete and enter new degrees.</p>

        <h2>Available Links</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Degree Level</th>
                        <th>Tasks Undertaken</th>
                        <th>Tasks Completed</th>
                        <th>Sponsors</th>
                        <th>Link</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->getDegree()}}</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td><a href="/profile/{{$user->id}}">Link</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
