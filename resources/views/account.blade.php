@extends('layouts.base')

@section('content')
    <div class="container container-profile">

        <div class="row my-2">

            <div class="col-md-4 pull-lg-8 text-xs-center">
                <h4 class="center-text">{{$user->name}} (ID: {{$user->id}})</h4>
                <img src="//placehold.it/150" class="mx-auto d-block img-fluid rounded-circle" alt="avatar">
                {{--
                @auth
                    @if ($user->id==Auth::user()->id)
                        <div class="mt-3">
                            <h6 class="m-t-2">Upload a different photo</h6>
                            <label class="custom-file">
                                <input type="file" id="file" class="custom-file-input dark-grey" disabled>
                                <span class="custom-file-control">Choose file</span>
                            </label>
                        </div>
                    @endif
                @endauth--}}
            </div>

            <div class="col-md-8 push-lg-4">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active tab" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-expanded="true">Profile</a>
                    </li>
                    @if($user->isSponsor())
                        <li class="nav-item">
                            <a class="nav-link tab" id="tasks-tab" data-toggle="tab" href="#tasks" role="tab" aria-controls="tasks" aria-expanded="true">Sponsoring</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link tab" id="tasks-tab" data-toggle="tab" href="#tasks" role="tab" aria-controls="tasks" aria-expanded="true">Sponsors</a>
                        </li>
                    @endif

                    @auth
                        @if ($user->id==Auth::user()->id)
                            <li class="nav-item">
                                <a class="nav-link tab" id="edit-tab" data-toggle="tab" href="#edit" role="tab" aria-controls="edit" onclick="checkScrollBar()">Edit Details</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                            </li>
                        @endif
                    @endauth

                    @if (Auth::User() && Auth::user()->isSponsor() && $user->isStudent())
                        @if(!($user->alreadySponsored(Auth::user()->id)))
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('dashboard')}}">Sponsor</a>
                            </li>
                        @endif
                    @endif
                </ul>

                <div class="tab-content mt-3" id="myTabContent">

                    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                            <!-- About Me -->
                            <div class="col-md-8">
                                <h4 class="mt-2"><span class="fa fa-id-card-o pull-xs-right"></span> About Me</h4>
                                <p>{{$user->aboutme}}</p>
                            </div>
                            <!-- Basic Details -->
                            <div class="col-md-4">
                                <h4 class="mt-2"><span class="fa fa-id-card-o pull-xs-right"></span> Details</h4>
                                <p>
                                    Website: {{$user->website}}<br/>
                                    Company: {{$user->company}}<br/>
                                    Account Type: {{$user->getAccType()}}<br/>
                                    @if($user->isStudent())
                                        Has Sponsorship? {{$user->isSponsored()}}<br />
                                        @if($user->isSponsored())
                                            Currently being sponsored by <b>{{$user->sponsoredBy()}}</b> sponsors.
                                        @else
                                            Currently has no sponsors.
                                        @endif
                                    @endif
                                    @if($user->isSponsor())
                                        Has Sponsored? {{$user->isSponsoring()}}
                                    @endif
                                </p>
                            </div>
                        </div>
                        <!--/row-->
                    </div>

                    <div class="tab-pane fade" id="tasks" role="tabpanel" aria-labelledby="tasks-tab">
                        <div class="row">
                            @if($user->isStudent())
                                <div class="col-md-12">
                                    <h4 class="mt-2"><span class="fa fa-clock-o ion-clock pull-xs-right"></span> Current Sponsors</h4>
                                    <table class="table table-hover table-striped">
                                        <tbody>
                                            @foreach($user->student_sponsor_list() as $sponsorship)
                                                <tr>
                                                    <td>
                                                        <strong>{{$sponsorship->sponsor->name}}</strong> sponsored this student on <strong>`{{$sponsorship->created_at}}`</strong>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="col-md-12">
                                    <h4 class="mt-2"><span class="fa fa-clock-o ion-clock pull-xs-right"></span> Currently sponsoring</h4>
                                    <table class="table table-hover table-striped">
                                        <tbody>
                                            @foreach($user->sponsor_student_list() as $sponsorship)
                                                <tr>
                                                    <td>
                                                        <strong>{{$user->name}}</strong> sponsored <strong>{{$sponsorship->student->name}}</strong> on <strong>`{{$sponsorship->created_at}}`</strong>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                        <!--/row-->
                    </div>

                    @auth
                        @if ($user->id==Auth::user()->id)

                            <div class="tab-pane fade" id="edit" role="tabpanel" aria-labelledby="edit-tab">
                                <h4 class="m-y-2">Edit Details</h4>
                                <form role="form" action="{{route('profile.update',Auth::user()->id)}}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT')}}
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label form-control-label">Name</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" value="{{Auth::user()->name}}" name="name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label form-control-label">Email</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="email" value="{{Auth::user()->email}}" name="email">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label form-control-label">Website</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" value="{{$user->website}}" name="website">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label form-control-label">Company</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" value="{{$user->company}}" name="company">
                                        </div>
                                    </div>

                                    @if(Auth::user() && Auth::user()->isStudent())
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label form-control-label">Qualification</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="degree_id">
                                                <option value="0" selected disabled>Degree Level...</option>
                                                @foreach($degrees as $degree)
                                                    <option value="{{$degree->id}}" {{ Auth::user()->degree_id == $degree->id ? 'selected="selected"' : '' }}>{{$degree->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @endif

                                    <div class="form-group basic-textarea row">
                                        <label class="col-md-3 col-form-label form-control-label">About Me</label>
                                        <div class="col-md-9">
                                            <textarea id="aboutme"  class="form-control" name="aboutme" required style="height: 160px; resize: none;">{{$user->aboutme}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label form-control-label"></label>
                                        <div class="col-md-9">
                                            <input type="submit" class="btn btn-primary" value="Save Changes">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
@endsection
