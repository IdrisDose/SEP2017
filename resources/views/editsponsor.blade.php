@extends('layouts.base')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto mt-5 outline-this animated fadeIn">
                <!--<div class=" center-text grad-content-bg">-->
                <div class="center-text mb-3">
                    <h2 class="mt-2">Edit Sponsorship</h2>
                    <form class="custom-form" method="POST" action="{{ route('sponsor.save',$sponsorship->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group">
                            <input type="text" value="{{$sponsorship->student->name}}" disabled>
                        </div>

                        <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                            <label for="price" class="sr-only">price</label>
                            <input id="amount" type="text" class="form-control" name="amount" value="{{$sponsorship->amount}}">

                            @if($errors->any())
                                <span class="help-block">
                                    <strong>{{ $errors->first() }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
