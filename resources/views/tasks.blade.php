@extends('layouts.base')

@section('content')
  <!-- Begin page content -->
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="mt-1">
                    <h1>Task List</h1>
                </div>
                <p class="lead">This is the list of all current and active tasks, keep an eye on this page as more tasks may join!</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @if(Auth::user()->isSponsor())
                    <a href="/newtask" class="btn btn-primary pull-right">+ New Task</a>
                @endif
                <h2>Available Tasks</h2>
                <hr class="orange">
            </div>
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Completed</th>
                                <th>Active</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr onclick="window.document.location='/task/{{$task->id}}';" style="cursor: pointer;">
                                    <td> <span class="task-name">{{$task->name}}</span></td>
                                    <td>${{$task->price}} AUD</td>
                                    <td>{{$task->isComplete()}}</td>
                                    <td>{{$task->isActive()}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
