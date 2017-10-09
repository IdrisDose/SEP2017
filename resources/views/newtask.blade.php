@extends('layouts.formcontainer')
@section('formcontent')
    <form class="form-register" method="POST" action="{{ route('task.create') }}">
        {{ csrf_field() }}
        <h2 class="form-register-heading center-text">Please enter details to be registered</h2>
        <div class="form-group">
            <label for="name" class="sr-only">Name</label>
            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus placeholder="Name">
        </div>

        <div class="form-group">
            <label for="description" class="sr-only">Description</label>
            <textarea id="description"  class="form-control" name="description" required placeholder="Task Description"></textarea>

        </div>

        <div class="form-group">
            <label for="price" class="sr-only">price</label>
            <input id="price" type="hidden" class="form-control" name="price" value="0.00">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Create
            </button>
        </div>
    </form>
@endsection
