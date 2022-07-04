@extends('layouts.app')

@section('content')
    <div class="row h-100 mt-5">
        <div class="col-sm-2 col-md-2">
            <div class="row d-flex flex-column h-100 bg-light py-0 my-0 rounded">
                {{-- Nav --}}
                <nav id="sidebarMenu" class="col-2 ">
                    <div class="sidebar-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.dashboard') }}">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.profile') }}">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.messages') }}">Messagges</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.reviews') }}">Reviews</a>
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

        <div class="col-sm-10 col-md-10 col-lg-9 offset-lg-1">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Details</h5>
                        </div>
                        {{-- img --}}
                        <div class="d-flex justify-content-center">
                            <img src="/img/img-placeholder.png" class="card-img-top rounded-circle" style="width: 190px"
                                alt="profile-img">
                        </div>
                        {{-- details --}}
                        <div class="card-body">
                            <h5 class="card-title">{{ $user->name }} {{ $user->surname }}</h5>
                            <p class="card-text">Location: {{ $user->location }}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <h6 class="mx-3">Specializations:</h6>
                            @foreach ($specializations as $specialization)
                                <li class="list-group-item">{{ $specialization->specialization }}</li>
                            @endforeach
                            <li class="list-group-item">Email: {{ $user->email }}</li>
                            <li class="list-group-item">Business Email: {{ $user->contactInfo->contact_email }}</li>
                            <li class="list-group-item">Phone: {{ $user->contactInfo->phone }}</li>
                            <li class="list-group-item">Github: <a href="">{{ $user->contactInfo->github }}</a>
                            </li>
                            <li class="list-group-item">Linkedin: <a
                                    href="">{{ $user->contactInfo->linkedin }}</a></li>
                            <li class="list-group-item">Site: <a href="">{{ $user->contactInfo->site }}</a></li>
                            {{-- <li class="list-group-item">CV: {{ $user->cv }}</li> --}}
                            <li class="list-group-item">Promo</li>
                            <li class="list-group-item">
                                <button class="btn btn-primary">
                                    <a class="text-white" href="{{ route('user.edit', $user->id) }}">Edit</a>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- <div class="row">
                <!-- edit form column -->
                <div class="col-12 personal-info">
                    <h3>Personal info</h3>

                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="col-lg-3 control-label">First name:</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" value="Jane">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Last name:</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" value="Bishop">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Company:</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Email:</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" value="janesemail@gmail.com">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Username:</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" value="janeuser">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Password:</label>
                            <div class="col-md-8">
                                <input class="form-control" type="password" value="11111122333">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Confirm password:</label>
                            <div class="col-md-8">
                                <input class="form-control" type="password" value="11111122333">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-8">
                                <input type="button" class="btn btn-primary" value="Save Changes">
                                <span></span>
                                <input type="reset" class="btn btn-default" value="Cancel">
                            </div>
                        </div>
                    </form>
                </div>
            </div> --}}
        </div>
    @endsection
