@extends('layouts.app')
{{-- @dd($user); --}}
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
                            <li class="nav-item">
                                <form action="{{ route('user.logout') }}" method="get">
                                    <button class="nav-link" type="submit">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

        <div class="col-sm-10 col-md-10 col-lg-9 offset-lg-1">
            <div class="row">
                <div class="order-sm-2 order-md-1 col-sm-10 col-md-6 col-lg-8">
                    <div class="row">
                        {{-- Statistiche --}}
                        <div class="col-md-12 col-lg-12 grid-margin stretch-card my-3">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title font-weight-medium mb-0">Statistics</h4>

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
                        {{-- Messaggi --}}
                        <div style="height: 500px;"
                            class="col-md-12 col-lg-6 grid-margin stretch-card my-3 overflow-auto h-100">
                            <div class="card">
                                <div class="card-body py-5 overflow-auto">
                                    {{-- title --}}
                                    <h5 class="card-title">Messages</h5>

                                    @foreach ($messages as $message)
                                        <ul class="list-group list-group-horizontal my-1">
                                            <li class="list-group-item">
                                                <h5>{{ $message->user_name }}</h5>
                                                <span>{{ $message->created_at }}</span>
                                            </li>
                                            <li class="list-group-item w-75">{{ $message->content }}</li>
                                        </ul>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        {{-- Recensioni --}}
                        <div class="col-md-12 col-lg-6 grid-margin stretch-card my-3">
                            <div class="card">
                                <div class="card-body py-5">
                                    {{-- title --}}
                                    <h5 class="card-title">Reviews</h5>

                                    @foreach ($reviews as $review)
                                        <ul class="list-group list-group-horizontal my-1">
                                            <li class="list-group-item">
                                                <h5>{{ $review->user_name }}</h5>
                                                <span>{{ $review->created_at }}</span>
                                            </li>
                                            <li class="list-group-item w-75">{{ $review->content }}</li>
                                        </ul>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="order-sm-1 order-ms-2 col-sm-10 col-md-6 col-lg-4">
                    <div class="row">
                        {{-- Profilo --}}
                        <div class="col-lg-10 col-xl-10 grid-margin my-3">
                            <div class="card d-flex">
                                {{-- title --}}
                                <div class="card-body">
                                    <h5 class="card-title">Profile</h5>
                                </div>
                                {{-- img --}}
                                <div class="d-flex justify-content-center">
                                    <img src="/img/img-placeholder.png" class="card-img-top rounded-circle"
                                        style="width: 190px" alt="profile-img">
                                </div>
                                {{-- details --}}
                                <div class="card-body">
                                    <h5 class="card-title">{{ $user->name }} {{ $user->surname }}</h5>
                                    <p class="card-text">{{ $user->location }}</p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    {{-- @dd($specializations); --}}
                                    @foreach ($specializations as $specialization)
                                        <li class="list-group-item">{{ $specialization->specialization }}</li>
                                    @endforeach
                                    @if ($user->contactInfo->github)
                                        <li class="list-group-item">Github: {{ $user->contactInfo->github }}</li>
                                    @endif
                                    <li class="list-group-item">Promo</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
