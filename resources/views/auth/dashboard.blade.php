@extends('layouts.app')

@section('content')
    <<<<<<< HEAD <div class="order-sm-2 order-md-1 col-sm-10 col-md-6 col-lg-8">
        <div class="row">
            {{-- Statistiche --}}
            <div class="col-md-12 col-lg-12 grid-margin stretch-card mb-3">
                <div class="itf-card">
                    <div class="itf-card-header">
                        <h4 class="itf-card-title">Statistics</h4>
                    </div>
                    <div class="itf-card-body">
                        <div class="row">
                            =======
                            <div class="row">
                                <div
                                    class="order-1 col-sm-12 order-sm-2 offset-sm-1 col-md-6 order-md-0 offset-md-0 col-lg-8 col-xl-6 offset-xl-1">
                                    <div class="row">
                                        {{-- Activity --}}
                                        <div class="col-md-12 col-lg-12 my-3">
                                            <div class="itf-card">
                                                <div class="itf-card-header">
                                                    <h5 class="itf-card-title">Your Activity</h5>
                                                </div>
                                                <div class="row itf-card-body py-5">
                                                    >>>>>>> a9580df68995cf1a2253a8f6960772d8d3305c6b
                                                    <div class="col-sm-12 col-md-6 col-lg-4">
                                                        <div class="text-center">
                                                            <h2>{{ round($avg_rating, 1) }}</h2>
                                                            <h5>Valutation</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-6 col-lg-4">
                                                        <div class="text-center">
                                                            <h2>{{ $totalReviews }}</h2>
                                                            <h5>Total Reviews</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-6 col-lg-4">
                                                        <div class="text-center">
                                                            <h2>{{ $totalMessages }}</h2>
                                                            <h5>Total Messages</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Messaggi --}}
                                    <div class="col-md-12 col-lg-6">
                                        <div class="itf-card">
                                            <div class="itf-card-header">
                                                <h4 class="itf-card-title">Messages</h4>
                                            </div>
                                            <div class="itf-card-body">
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
                                    <div class="col-md-12 col-lg-6">
                                        <div class="itf-card">
                                            <div class="itf-card-header">
                                                <h4 class="itf-card-title">Reviews</h4>
                                            </div>
                                            {{-- title --}}
                                            <div class="itf-card-body">
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
                                    <div class="col-lg-10 col-xl-10">
                                        <div class="itf-card">
                                            <div class="itf-card-header">
                                                <h4 class="itf-card-title">Profile</h4>
                                            </div>
                                            <div class="itf-card-body">
                                                {{-- img --}}
                                                <div class="d-flex justify-content-center">
                                                    <img src="{{ asset('./storage/' . $user->img_path) }}"
                                                        alt="profile-img" class="card-img-top rounded-circle"
                                                        style="width: 190px" />

                                                </div>
                                                {{-- details --}}
                                                <div class="text-center mb-2">
                                                    <h5 class="itf-card-title">{{ $user->name }} {{ $user->surname }}
                                                    </h5>
                                                    <p class="itf-card-subtitle">{{ $user->location }}</p>
                                                </div>
                                                <ul class="list-group list-group-flush">
                                                    <h5 class="itf-card-title itf-card-title-small">Specializations</h5>
                                                    @foreach ($specializations as $specialization)
                                                        <li>{{ $specialization->specialization }}</li>
                                                    @endforeach
                                                    {{-- @if ($user->contactInfo->github)
                            <li class="list-group-item">Github: {{ $user->contactInfo->github }}</li>
                        @endif --}}
                                                    <li class="list-group-item">
                                                        @foreach ($promos as $promo)
                                                            <h6>Promo: {{ $promo->type }}</h6>
                                                            <span>Duration: {{ $promo->duration }} days</span>
                                                        @endforeach
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endsection
