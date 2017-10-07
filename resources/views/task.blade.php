@extends('layouts.base')

@section('content')
    <div class="container acc-container clearfix">
        <h1>{{$task->name}} (ID: {{$task->id}})</h1>
        <ul>
            <li>ID: {{$task->id}}</li>
            <li>OWNER: {{$task->getOwner()}}</li>
            <li>NAME: {{$task->name}}</li>
            <li>Description: {{$task->description}}</li>
            <li>price: {{$task->price}}</li>
            <li>ID: {{$task->isActive()}}</li>
            <li>ID: {{$task->isComplete()}}</li>
        </ul>
    </div>
@endsection
