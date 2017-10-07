@extends('layouts.base')

@section('content')
    @if(Auth::user()->acctype == 'student')
        @include('inc.student-dash')
    @else
        @include('inc.sponsor-dash')
    @endif
@endsection
