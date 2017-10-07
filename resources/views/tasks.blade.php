@extends('layouts.base')

@section('content')
  <!-- Begin page content -->
    <div class="container">

        <div class="mt-3">
            <h1>Task List</h1>
        </div>
        <p class="lead">This is the list of all current and active tasks, keep an eye on this page as more tasks may join!</p>

        <h2>Available Tasks</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Completed</th>
                        <th>Active</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td>{{$task->id}}</td>
                            <td>{{$task->name}}</td>
                            <td>{{$task->description}}</td>
                            <td>${{$task->Price}} AUD</td>
                            <td>{{$task->completed}}</td>
                            <td>{{$task->active}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
