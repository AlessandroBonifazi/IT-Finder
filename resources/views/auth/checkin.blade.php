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
                                <a class="nav-link" href="#">Reviews</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('user.checkin')}}">Promo</a>
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


                        {{-- Messaggi --}}
                        <div style="height: 500px;"
                            class="col-md-12 col-lg-6 grid-margin stretch-card my-3 overflow-auto h-100">
                            <div class="card">
                                <div class="card-body py-5 overflow-auto">
                                    {{-- title --}}
                                    <h5 class="card-title">Messages</h5>

                                    @foreach ($promos as $promo)
                                        <ul class="list-group list-group-horizontal my-1">

                                            <li class="list-group-item">
                                                <a href="{{ route('user.checkout', $promo->id) }}">


                                                <h5>Type: {{ $promo->type }}</h5>


                                                <span>Duration: {{ $promo->duration }}</span>
                                                </a>
                                            </li>
                                            <li class="list-group-item w-75">Price: {{ $promo->price }}</li>

                                        </ul>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
