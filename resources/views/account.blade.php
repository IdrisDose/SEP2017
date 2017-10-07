@extends('layouts.base')

@section('content')
    <div class="container acc-container clearfix">
        <p>Name: {{$user->name}}</p>
        <p>AccType: {{$user->acctype}}</p>
        <p>Balance: {{$user->balance}}</p>
        <p>Active? {{$user->isActive()}}</p>
    </div>
@endsection
