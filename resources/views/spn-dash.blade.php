@extends('layouts.base')

@section('content')

    <!-- Side Navbar -->
    <nav class="side-navbar">
        <div class="side-navbar-wrapper">
            <div class="sidenav-header d-flex align-items-center justify-content-center">
                <div class="sidenav-header-inner text-center"><img src="{{ asset('/uploads/avatars/'.Auth::user()->avatar) }}" alt="person" class="img-fluid rounded-circle">
                    <h2 class="h5 text-uppercase">{{Auth::user()->getName()}}</h2><span class="text-uppercase">{{Auth::user()->acctype}}</span>
                </div>
                <div class="sidenav-header-logo"><a href="index.html" class="brand-small text-center"> <strong>B</strong><strong class="text-primary">D</strong></a></div>
            </div>
            <div class="main-menu">
                <ul id="side-main-menu" class="side-menu list-unstyled">
                    <li class="active"><a href="" disabled> <i class="icon-home"></i><span>Home</span></a></li>
                    <li>
                        <a href=""></a>


                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="page home-page">

        <div class="db-wrap">
            <header class="header">
                @include('inc.navbar')
            </header>

            <section class="dashboard-counts section-padding section-no-padding-bottom">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-3">
                            <div class="wrapper count-title d-flex purple">
                                <div class="icon"><i class="icon-user"></i></div>
                                <div class="name"><strong class="text-uppercase">Tasks Pending</strong>
                                    <div class="count-number">0</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="wrapper count-title d-flex green">
                                <div class="icon"><i class="icon-bill"></i></div>
                                <div class="name"><strong class="text-uppercase">Tasks Complete</strong>
                                    <div class="count-number">0</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="wrapper count-title d-flex blue">
                                <div class="icon"><i class="icon-padnote"></i></div>
                                <div class="name"><strong class="text-uppercase">Balance</strong>
                                    <div class="count-number">{{Auth::user()->getBalance()}} AUD</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="wrapper count-title d-flex red">
                                <div class="icon"><i class="icon-check"></i></div>
                                <div class="name"><strong class="text-uppercase">Sponsoring</strong>
                                    <div class="count-number">{{Auth::user()->sponsoring()}}</div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <section class="statistics section-padding">
                <div class="container-fluid">
                    <div class="row d-flex align-items-md-stretch">
                        <div class="col-md-6">
                            <!-- Income-->
                            <div class="wrapper income align-middle">

                                <div class="d-flex align-items-center">
                                    <h2 class="db-section-title center-text">Students you're sponsoring</h2>
                                </div>
                                @if(Auth::user()->sponsoring() > 0)
                                    <table class="table mx-auto">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Sponsors</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($sponsorships as $sponsorship)
                                                @if($sponsorship->sponsor->id == Auth::user()->id)
                                                    @php
                                                    $student = $sponsorship->student;
                                                    $uid = $student->id;
                                                    $sid = $sponsorship->id;
                                                    @endphp
                                                    <tr>
                                                        <td onclick="window.document.location='/profile/{{$uid}}';" style="cursor: pointer;">{{$uid}}</td>
                                                        <td onclick="window.document.location='/profile/{{$uid}}';" style="cursor: pointer;">{{$student->getName()}}</td>
                                                        <td onclick="window.document.location='/profile/{{$uid}}';" style="cursor: pointer;">{{$student->sponsoredBy()}}</td>
                                                        <td>
                                                            <a href="" onclick="event.preventDefault(); document.getElementById('stop-sponsor-form-{{$sid}}').submit();" class="btn btn-danger btn-sm">Cancel Sponsorship</a>
                                                            <form id="stop-sponsor-form-{{$sid}}" action="{{ route('sponsor.delete', $sid) }}" method="POST" style="display: none;">{{ csrf_field() }} {{ method_field('DELETE') }}</form>
                                                        </td>
                                                        <td>
                                                            <a class="btn btn-primary btn-sm" href="{{route('sponsorship.edit',$sponsorship->id)}}">Edit</a>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <p class="center-text">You aren't sponsoring anybody.</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- User Actibity-->
                            <div class="wrapper user-activity">
                                <h2 class="display h4 db-section-title">User Activity</h2>
                                <div class="number">0</div>
                                <h3 class="h4 display db-section-title">Social Users</h3>
                                <div class="progress">
                                    <div role="progressbar" style="width: {{ Auth::user()->getSponsorRate() }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar bg-primary"></div>
                                </div>
                                <div class="page-statistics d-flex justify-content-between">
                                    <div class="page-visites db-section-title"><span>Tasks Completed</span><strong>0</strong></div>
                                    <div class="new-visites db-section-title"><span>Sponsored Students</span><strong>{{ Auth::user()->getSponsorRate() }}%</strong></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>

            <section id="sponsor" class="statistics section-no-padding-bottom ">
                <div class="container-fluid">
                    <div class="row d-flex align-items-stretch">
                        <div class="col-md-6">
                            <!-- User Actibity-->
                            <div class="wrapper sponsor-form">
                                <h2 class="db-section-title center-text">Sponsor a Student</h2>
                                <form class="" action="{{ route('sponsor.create') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="student_id">Student</label>
                                        <select id="student_id" class="form-control" name="student_id" >
                                            <option value="" selected disabled>Choose a Student</option>
                                            @foreach( $students as $student)
                                                @if(!($student->studentIsSponsored(Auth::user()->id)))
                                                    <option value="{{$student->id}}">{{$student->getName()}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <input type="hidden" name="sponsor_id" value="{{Auth::user()->id}}">
                                    <input type="hidden" name="active" value="1">
                                    <button id="sponsSubmit" type="submit" class="btn btn-primary pull-right mx-auto mb-3" name="sponsSubmit">Submit</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="wrapper add-funds">
                                <h2 class="db-section-title center-text">Add Funds</h2>
                                <form id="add-funds-form" class="custom-form" method="POST" action="{{ route('user.addfunds') }}">
                                    {{ csrf_field() }}

                                    <div class="form-group center-text">
                                        <label class="center-text">Select an option or enter a custom amount below</label>
                                        <div>
                                            <button type="button" id='fundsAdd5' class="btn btn-primary btn-sm">Add $5</button>
                                            <button type="button" id='fundsAdd10' class="btn btn-primary btn-sm">Add $10</button>
                                            <button type="button" id='fundsAdd20' class="btn btn-primary btn-sm">Add $20</button>
                                            <button type="button" id='fundsAdd50' class="btn btn-primary btn-sm">Add $50</button>
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->any() ? ' has-error' : '' }}">
                                        <label for="price">Cusom Amount: (Max $250)</label>
                                        <input id="balance" type="text" class="form-control" name="balance" value="0.00">

                                        @if($errors->any())
                                            <span class="help-block">
                                                <strong>{{ $errors->first() }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary mx-auto">
                                            Add Funds
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>


    </div>
@endsection
