@extends('layouts.app')
{{-- @dd($user); --}}
@section('content')
    <div class="row h-100 my-5">
        <div class="col-2">
            <div class="row d-flex flex-column h-100 bg-light py-0 my-0">
                {{-- Nav --}}
                <nav id="sidebarMenu" class="col-2 ">
                    <div class="sidebar-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Messagges</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Reviews</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Promo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Statistics</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

        <div class="col-9 offset-1">
            <div class="row">
                {{-- Statistiche --}}
                <div class="col-sm-12 col-md-6 col-lg-8 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title font-weight-medium mb-0 d-none d-md-block">Statistics</h4>

                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-3">
                                    <div>
                                        <h2>4.5</h2>
                                        <h5>Valutation</h5>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-3">
                                    <div>
                                        <h2>21</h2>
                                        <h5>Total Reviews</h5>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-3">
                                    <div>
                                        <h2>21</h2>
                                        <h5>Total Messages</h5>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-3">
                                    <div>
                                        <h2>21</h2>
                                        <h5>Total Views</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Profilo --}}
                <div class="col-sm-12 col-md-5 col-lg-4 col-xl-3 grid-margin ">
                    <div class="card d-flex">
                        {{-- title --}}
                        <div class="card-body">
                            <h5 class="card-title">Profile</h5>
                        </div>
                        {{-- img --}}
                        <div class="d-flex justify-content-center">
                            <img src="/img/img-placeholder.png" class="card-img-top rounded-circle" style="width: 190px"
                                alt="profile-img">
                        </div>
                        {{-- details --}}
                        <div class="card-body">
                            <h5 class="card-title">Nome Cognome</h5>
                            <p class="card-text">Descrizione</p>

                        </div>
                        <ul class="list-group list-group-flush">
                            {{-- <li class="list-group-item">Specializzazioni</li> --}}
                            <li class="list-group-item"><a href="">link</a></li>
                            <li class="list-group-item">Promo</li>
                        </ul>
                    </div>
                </div>
                {{-- Messaggi --}}
                <div class="col-sm-12 col-md-6 col-lg-4 grid-margin stretch-card my-2">
                    <div class="card">
                        <div class="card-body py-5">
                            {{-- title --}}
                            <h5 class="card-title">Messages</h5>

                            <ul class="list-group list-group-horizontal my-1">
                                <li class="list-group-item">Contact Name</li>
                                <li class="list-group-item w-75">messagge</li>
                            </ul>
                            <ul class="list-group list-group-horizontal my-1">
                                <li class="list-group-item">Contact Name</li>
                                <li class="list-group-item w-75">messagge</li>
                            </ul>
                            <ul class="list-group list-group-horizontal my-1">
                                <li class="list-group-item">Contact Name</li>
                                <li class="list-group-item w-75">messagge</li>
                            </ul>
                        </div>
                    </div>
                </div>
                {{-- Recensioni --}}
                <div class="col-sm-12 col-md-6 col-lg-4 grid-margin stretch-card my-2">
                    <div class="card">
                        <div class="card-body py-5">
                            {{-- title --}}
                            <h5 class="card-title">Reviews</h5>

                            <ul class="list-group list-group-horizontal my-1">
                                <li class="list-group-item">Contact Name</li>
                                <li class="list-group-item w-75">review</li>
                            </ul>
                            <ul class="list-group list-group-horizontal my-1">
                                <li class="list-group-item">Contact Name</li>
                                <li class="list-group-item w-75">review</li>
                            </ul>
                            <ul class="list-group list-group-horizontal my-1">
                                <li class="list-group-item">Contact Name</li>
                                <li class="list-group-item w-75">review</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    </div>

    {{-- template examples --}}
    {{-- <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div
                        class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
                        <div class="float-left">
                            <i class="mdi mdi-cube text-danger icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="mb-0 text-right">Total Revenue</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0">$65,650</h3>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted mt-3 mb-0 text-left text-md-center text-xl-left">
                        <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> 65% lower growth
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div
                        class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
                        <div class="float-left">
                            <i class="mdi mdi-receipt text-warning icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="mb-0 text-right">Orders</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0">3455</h3>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted mt-3 mb-0 text-left text-md-center text-xl-left">
                        <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> Product-wise sales
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div
                        class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
                        <div class="float-left">
                            <i class="mdi mdi-poll-box text-success icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="mb-0 text-right">Sales</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0">5693</h3>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted mt-3 mb-0 text-left text-md-center text-xl-left">
                        <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> Weekly Sales
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div
                        class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
                        <div class="float-left">
                            <i class="mdi mdi-account-box-multiple text-info icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="mb-0 text-right">Employees</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0">246</h3>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted mt-3 mb-0 text-left text-md-center text-xl-left">
                        <i class="mdi mdi-reload mr-1" aria-hidden="true"></i> Product-wise sales
                    </p>
                </div>
            </div>
        </div>
    </div> --}}
    {{-- <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h2 class="card-title mb-0">Product Analysis</h2>
                        <div class="wrapper d-flex">
                            <div class="d-flex align-items-center mr-3">
                                <span class="dot-indicator bg-success"></span>
                                <p class="mb-0 ml-2 text-muted">Product</p>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="dot-indicator bg-primary"></span>
                                <p class="mb-0 ml-2 text-muted">Resources</p>
                            </div>
                        </div>
                    </div>
                    <div class="chart-container">
                        <canvas id="dashboard-area-chart" height="80"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    {{-- <div class="row">
        <div class="col-md-6 col-xl-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Todo</h4>
                    <div class="add-items d-flex">
                        <input type="text" class="form-control todo-list-input" placeholder="What do you need to do today?">
                        <button class="add btn btn-primary font-weight-medium todo-list-add-btn">Add</button>
                    </div>
                    <div class="list-wrapper">
                        <ul class="d-flex flex-column-reverse todo-list todo-list-custom">
                            <li class="completed">
                                <div class="form-check form-check-flat">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox" checked> Call John </label>
                                </div>
                                <i class="remove mdi mdi-close-circle-outline"></i>
                            </li>
                            <li>
                                <div class="form-check form-check-flat">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox"> Create invoice </label>
                                </div>
                                <i class="remove mdi mdi-close-circle-outline"></i>
                            </li>
                            <li>
                                <div class="form-check form-check-flat">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox"> Print Statements </label>
                                </div>
                                <i class="remove mdi mdi-close-circle-outline"></i>
                            </li>
                            <li class="completed">
                                <div class="form-check form-check-flat">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox" checked> Prepare for presentation </label>
                                </div>
                                <i class="remove mdi mdi-close-circle-outline"></i>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Schedules</h4>
                    <div class="shedule-list d-flex align-items-center justify-content-between mb-3">
                        <h3>27 Sep 2018</h3>
                        <small>21 Events</small>
                    </div>
                    <div class="event border-bottom py-3">
                        <p class="mb-2 font-weight-medium">Skype call with alex</p>
                        <div class="d-flex align-items-center">
                            <div class="badge badge-success">3:45 AM</div>
                            <small class="text-muted ml-2">London, UK</small>
                            <div class="image-grouped ml-auto">
                                <img src="{{ url('assets/images/faces/face10.jpg') }}" alt="profile image">
                                <img src="{{ url('assets/images/faces/face13.jpg') }}" alt="profile image">
                            </div>
                        </div>
                    </div>
                    <div class="event py-3 border-bottom">
                        <p class="mb-2 font-weight-medium">Data Analysing with team</p>
                        <div class="d-flex align-items-center">
                            <div class="badge badge-warning">12.30 AM</div>
                            <small class="text-muted ml-2">San Francisco, CA</small>
                            <div class="image-grouped ml-auto">
                                <img src="{{ url('assets/images/faces/face20.jpg') }}" alt="profile image">
                                <img src="{{ url('assets/images/faces/face17.jpg') }}" alt="profile image">
                                <img src="{{ url('assets/images/faces/face14.jpg') }}" alt="profile image">
                            </div>
                        </div>
                    </div>
                    <div class="event py-3">
                        <p class="mb-2 font-weight-medium">Meeting with client</p>
                        <div class="d-flex align-items-center">
                            <div class="badge badge-danger">4.15 AM</div>
                            <small class="text-muted ml-2">San Diego, CA</small>
                            <div class="image-grouped ml-auto">
                                <img src="{{ url('assets/images/faces/face21.jpg') }}" alt="profile image">
                                <img src="{{ url('assets/images/faces/face16.jpg') }}" alt="profile image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-xl-4 grid-margin stretch-card">
            <div class="row flex-grow">
                <div class="col-md-6 col-xl-12 grid-margin grid-margin-md-0 grid-margin-xl stretch-card">
                    <div class="card card-revenue">
                        <div class="card-body d-flex align-items-center">
                            <div class="d-flex flex-grow">
                                <div class="mr-auto">
                                    <p class="highlight-text mb-0 text-white"> $168.90 </p>
                                    <p class="text-white"> This Month </p>
                                    <div class="badge badge-pill"> 18% </div>
                                </div>
                                <div class="ml-auto align-self-end">
                                    <div id="revenue-chart" sparkType="bar" sparkBarColor="#e6ecf5" barWidth="2">
                                        4,3,10,9,4,3,8,6,7,8 </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-12 stretch-card">
                    <div class="card card-revenue-table">
                        <div class="card-body">
                            <div class="revenue-item d-flex">
                                <div class="revenue-desc">
                                    <h6>Member Profit</h6>
                                    <p class="font-weight-light"> Average Weekly Profit </p>
                                </div>
                                <div class="revenue-amount">
                                    <p class="text-primary"> +168.900 </p>
                                </div>
                            </div>
                            <div class="revenue-item d-flex">
                                <div class="revenue-desc">
                                    <h6>Total Profit</h6>
                                    <p class="font-weight-light"> Weekly Customer Orders </p>
                                </div>
                                <div class="revenue-amount">
                                    <p class="text-primary"> +6890.00 </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    {{-- <div class="row">
        <div class="col-lg-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Orders</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> First name </th>
                                    <th> Progress </th>
                                    <th> Amount </th>
                                    <th> Sales </th>
                                    <th> Deadline </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="font-weight-medium"> 1 </td>
                                    <td> Herman Beck </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-success progress-bar-striped" role="progressbar"
                                                style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td> $ 77.99 </td>
                                    <td class="text-danger"> 53.64% <i class="mdi mdi-arrow-down"></i>
                                    </td>
                                    <td> May 15, 2015 </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-medium"> 2 </td>
                                    <td> Messsy Adam </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-danger progress-bar-striped" role="progressbar"
                                                style="width: 75%" aria-valuenow="75" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td> $245.30 </td>
                                    <td class="text-success"> 24.56% <i class="mdi mdi-arrow-up"></i>
                                    </td>
                                    <td> July 1, 2015 </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-medium"> 3 </td>
                                    <td> John Richards </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-warning progress-bar-striped" role="progressbar"
                                                style="width: 90%" aria-valuenow="90" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td> $138.00 </td>
                                    <td class="text-danger"> 28.76% <i class="mdi mdi-arrow-down"></i>
                                    </td>
                                    <td> Apr 12, 2015 </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-medium"> 4 </td>
                                    <td> Peter Meggik </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-primary progress-bar-striped" role="progressbar"
                                                style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td> $ 77.99 </td>
                                    <td class="text-danger"> 53.45% <i class="mdi mdi-arrow-down"></i>
                                    </td>
                                    <td> May 15, 2015 </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-medium"> 5 </td>
                                    <td> Edward </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-danger progress-bar-striped" role="progressbar"
                                                style="width: 35%" aria-valuenow="35" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td> $ 160.25 </td>
                                    <td class="text-success"> 18.32% <i class="mdi mdi-arrow-up"></i>
                                    </td>
                                    <td> May 03, 2015 </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
