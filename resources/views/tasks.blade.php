@extends('layouts.base')

@section('content')
  <!-- Begin page content -->
    <div class="container">

        <div class="mt-1">
            <h1>Task List</h1>
        </div>
        <p class="lead">This is the list of all current and active tasks, keep an eye on this page as more tasks may join!</p>
        @if(Auth::user()->isSponsor())
            <a href="/newtask" class="btn btn-primary fl-right">+ New Task</a>
        @endif
        <h2>Available Tasks</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Completed</th>
                        <th>Active</th>
                        <th>Link</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr onclick="window.document.location='/task/{{$task->id}}';" style="cursor: pointer;">
                            <td><a href="/task/{{$task->id}}">{{$task->name}}</a></td>
                            <td>${{$task->price}} AUD</td>
                            <td>{{$task->isComplete()}}</td>
                            <td>{{$task->isActive()}}</td>
                            <td><a href="/task/{{$task->id}}">LINK</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
