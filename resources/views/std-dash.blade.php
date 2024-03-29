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
                </div>
            </nav>
            <div class="page home-page">
                <header class="header">
                    @include('inc.navbar')
                </header>
                <!-- Counts Section -->
                <section class="dashboard-counts section-padding section-no-padding-bottom">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="wrapper count-title d-flex purple">
                                    <div class="icon"><i class="icon-bill"></i></div>
                                    <div class="name"><strong class="text-uppercase"> Tasks Pending</strong>
                                        <div class="count-number mt-3">0</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="wrapper count-title d-flex green">
                                    <div class="icon"><i class="icon-bill"></i></div>
                                    <div class="name"><strong class="text-uppercase"> Tasks Complete</strong><span>Last 7 days</span>
                                        <div class="count-number">0</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="wrapper count-title d-flex blue">
                                    <div class="icon"><i class="icon-bill"></i></div>
                                    <div class="name"><strong class="text-uppercase"> Balance</strong>
                                        <div class="count-number mt-3">{{Auth::user()->getBalance()}} AUD</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="wrapper count-title d-flex red">
                                    <div class="icon"><i class="icon-bill"></i></div>
                                    <div class="name"><strong class="text-uppercase"> Sponsors</strong>
                                        <div class="count-number mt-3">{{Auth::user()->sponsoredBy()}}</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>

                <!-- Header Section-->
                <section class="statistics section-padding section-no-padding-bottom">
                  <div class="container-fluid">
                    <div class="row d-flex align-items-stretch">
                     <!-- <div class="col-md-6">

                          <div class="wrapper income text-center align-middle">
                            <div class="number">${{Auth::user()->balance}} AUD</div><strong class="text-primary">All Income</strong>
                            <p>Total amount recieved via tasks and sponsorships</p>
                          </div>
                      </div>-->

                      <div class="col-6">
                          <div class="wrapper">
                              <div class="d-flex align-items-center">
                                  <h2 class="db-section-title center-text">Tasks to complete</h2>
                              </div>
                              <table class="table mx-auto">
                                  <thead>
                                      <tr>
                                          <th>#</th>
                                          <th>Name</th>
                                          <th>Description</th>
                                          <th>Owner</th>
                                          <th>Price</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <tr>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                      </tr>
                                  </tbody>
                              </table>
                          </div>
                      </div>

                      <div class="col-md-6">
                        <div class="wrapper user-activity">
                          <h2 class="display h4 db-section-title">User Activity</h2>
                          <div class="number">0</div>
                          <h3 class="h4 display db-section-title">Completion Rate</h3>
                          <div class="progress">
                            <div role="progressbar" style="width: 0%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar bg-primary"></div>
                          </div>
                          <div class="page-statistics d-flex justify-content-between">
                            <div class="page-visites db-section-title"><span>Tasks Completed</span><strong>0</strong></div>
                            <div class="new-visites db-section-title"><span>Completion Rate</span><strong>0%</strong></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              </section>


            </div>

@endsection
