@extends('layouts.base')

@section('content')
  <div class="container-fluid">
        <div class="row">
            <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="/account">Lorem's Account Page</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Overview <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Reports</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Tasks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Export</a>
                    </li>
                </ul>
            </nav>

            <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
                <h1>Student Dashboard (ID: null)</h1>

                <section class="row text-center placeholders">
                    <div class="col-6 col-sm-3 placeholder">
                        <h4>Completion Rate</h4>
                        <div class="text-muted">null</div>
                    </div>
                    <div class="col-6 col-sm-3 placeholder">
                        <h4>Amount Sponsored</h4>
                        <span class="text-muted">$null AUD</span>
                    </div>
                    <div class="col-6 col-sm-3 placeholder">
                        <h4>Sponsored By</h4>
                        <span class="text-muted">null Sponsor</span>
                    </div>
                    <div class="col-6 col-sm-3 placeholder">
                        <h4>Current Balance</h4>
                        <span class="text-muted">$null AUD</span>
                    </div>
                </section>

                <h2>Section title</h2>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Amount Sponsored</th>
                                <th>Completed Task</th>
                                <th>Current Work Available</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
@endsection
