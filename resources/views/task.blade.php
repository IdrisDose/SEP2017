@extends('layouts.base')

@section('content')
    <div class="container container-profile">

        <div class="row my-2">
            <div class="col-md-12 push-lg-4">
                <h4 class="center-text">Task Name: {{$task->name}} (ID: {{$task->id}})</h4>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active tab" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-expanded="true">Details</a>
                    </li>
                </ul>

                <div class="tab-content mt-3" id="myTabContent">

                    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">

                            <div class="col-md-6">
                                <h4 class="mt-2"><span class="fa fa-id-card-o pull-xs-right"></span> Details</h4>
                                <p>
                                    Owner: {{$task->getOwner()}}
                                    <br>Price: ${{$task->price}}
                                    <br>Is Active: {{$task->isActive()}}
                                </p>
                            </div>
                            <div class="col-md-6">
                                <h4 class="mt-2"><span class="fa fa-book pull-xs-right"></span> Description</h4>
                                <p>
                                    {{$task->description}}
                                </p>
                            </div>
                        </div>
                        <!--/row-->
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
