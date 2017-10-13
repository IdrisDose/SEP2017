@extends('layouts.base')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto mt-5 outline-this animated fadeIn">
                <!--<div class=" center-text grad-content-bg">-->
                <div class="center-text mb-3">
                    <h2 class="mt-2">New Task</h2>
                    <form class="custom-form" method="POST" action="{{ route('task.create') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name" class="sr-only">Name</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus placeholder="Name">
                        </div>

                        <div class="form-group basic-textarea">
                            <label for="description" class="sr-only">Description</label>
                            <textarea id="description"  class="form-control" name="description" required placeholder="Task Description" style="height: 160px; resize: none;"></textarea>

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
                </div>
            </div>
        </div>
    </div>
@endsection
