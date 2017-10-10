@extends('layouts.base')

@section('content')
    <div class="container container-profile">

        <div class="row my-2">

            <div class="col-lg-4 pull-lg-8 text-xs-center">
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

            <div class="col-lg-8 push-lg-4">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active tab" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-expanded="true">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link tab" id="tasks-tab" data-toggle="tab" href="#tasks" role="tab" aria-controls="tasks" aria-expanded="true">Tasks</a>
                    </li>
                    @auth
                        @if ($user->id==Auth::user()->id)
                            <li class="nav-item">
                                <a class="nav-link tab" id="edit-tab" data-toggle="tab" href="#edit" role="tab" aria-controls="edit" onclick="checkScrollBar()">Edit Details</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                            </li>
                            <!--
                            <li class="nav-item">
                                <a class="nav-link tab" id="edit-tab" data-toggle="tab" href="#editlogin" role="tab" aria-controls="editlogin">Edit login</a>
                            </li>-->
                        @endif
                    @endauth
                    @if (Auth::User() && Auth::user()->isSponsor() && $user->isStudent())
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard#sponsor">Sponsor</a>
                        </li>
                    @endif
                </ul>

                <div class="tab-content mt-3" id="myTabContent">
                    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <h4 class="my-2">User Profile</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <span class="tag tag-primary"><i class="fa fa-user"></i> 0 Followers</span>
                                <span class="tag tag-success"><i class="fa fa-cog"></i> 0 Task Complete</span>
                                <span class="tag tag-danger"><i class="fa fa-eye"></i> 0 Views</span>
                            </div>
                            <div class="col-md-6">

                            </div>
                            <div class="col-md-12">
                                <h4 class="mt-2"><span class="fa fa-clock-o ion-clock pull-xs-right"></span> About</h4>
                                <p>
                                    Website: {{$user->website}}<br/>
                                    Company: {{$user->company}}<br/>
                                    Account Type: {{$user->acctype}}<br/>
                                    @if($user->isStudent())
                                        Has Sponsorship? {{$user->hasSponsorship($user->id)}}
                                    @endif
                                    @if($user->isSponsor())
                                        Has Sponsored? {{$user->hasSponsoring($user->id)}}
                                    @endif
                                </br/>
                                </br/>
                                </p>
                            </div>
                        </div>
                        <!--/row-->
                    </div>

                    <div class="tab-pane fade" id="tasks" role="tabpanel" aria-labelledby="tasks-tab">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="mt-2"><span class="fa fa-clock-o ion-clock pull-xs-right"></span> Current Tasks</h4>
                                <table class="table table-hover table-striped">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <strong>Abby</strong> joined ACME Project Team in <strong>`Collaboration`</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>Gary</strong> deleted My Board1 in <strong>`Discussions`</strong>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>Kensington</strong> deleted MyBoard3 in <strong>`Discussions`</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>John</strong> deleted My Board1 in <strong>`Discussions`</strong>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>Skell</strong> deleted his post Look at Why this is.. in <strong>`Discussions`</strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
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
                                        <label class="col-lg-3 col-form-label form-control-label">Name</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="text" value="{{Auth::user()->name}}" name="name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="email" value="{{Auth::user()->email}}" name="email">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Website</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="text" value="{{$user->website}}" name="website">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Company</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="text" value="{{$user->company}}" name="company">
                                        </div>
                                    </div>

                                    @if(Auth::user() && Auth::user()->isStudent())
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Qualification</label>
                                        <div class="col-lg-9">
                                            <select class="form-control" name="degree_id">
                                                <option value="0" selected disabled>Degree Level...</option>
                                                @foreach($degrees as $degree)
                                                    <option value="{{$degree->id}}" {{ Auth::user()->degree_id == $degree->id ? 'selected="selected"' : '' }}>{{$degree->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label"></label>
                                        <div class="col-lg-9">
                                            <input type="submit" class="btn btn-primary" value="Save Changes">
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!--
                            <div class="tab-pane fade" id="editlogin" role="tabpanel" aria-labelledby="edilogin-tab">
                                <h4 class="m-y-2">Edit Login</h4>
                                <form role="form">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Username</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="text" value="{{Auth::user()->email}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Password</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="password" value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Confirm password</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="password" value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label"></label>
                                        <div class="col-lg-9">
                                            <input type="button" class="btn btn-primary" value="Save Changes">
                                        </div>
                                    </div>
                                </form>
                            </div>-->
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
@endsection
