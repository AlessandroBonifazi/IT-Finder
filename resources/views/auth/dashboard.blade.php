@extends('layouts.app')

@section('content')
    <div class="col-12">
        <div class="row">
            {{-- Statistiche --}}
            <div class="col-12 col-lg-8 order-1 order-lg-0">
                <div class="row">
                    {{-- Activity --}}
                    <div class="col-12 mb-4">
                        <div class="itf-card">
                            <div class="itf-card-header">
                                <h5 class="itf-card-title">Your Activity</h5>
                            </div>
                            <div class="row itf-card-body py-5">
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
                <div class="row">
                    {{-- Messaggi --}}
                    <div class="col-md-12 col-xl-6 mb-md-4">
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
                    <div class="col-md-12 col-xl-6 mb-md-4">
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
            <div class="col-12 col-lg-4 order-0 order-lg-1">

                {{-- Profilo --}}

                <div class="itf-card mb-4">
                    <div class="itf-card-header">
                        <h4 class="itf-card-title">Profile</h4>
                    </div>
                    <div class="itf-card-body">
                        {{-- img --}}
                        <div class="d-flex justify-content-center">
                            <img src="{{ asset('./storage/' . $user->img_path) }}" alt="profile-img"
                                class="card-img-top rounded-circle" style="width: 190px" />

                        </div>
                        {{-- details --}}
                        <div class="text-center mb-2">
                            <h5 class="itf-card-title">{{ $user->name }} {{ $user->surname }}
                            </h5>
                            <p class="itf-card-subtitle">{{ $user->location }}</p>
                        </div>
                        <h5 class="itf-card-title itf-card-title-small">Specializations</h5>
                        <ul class="list-group list-group-flush">
                            @if (isset($user->specializations))
                                @if ($user->specializations->count() > 1)
                                    @foreach ($user->specializations as $specialization)
                                        <li class="list-group-item">{{ $specialization->specialization }}</li>
                                    @endforeach
                                @else
                                    <li class="list-group-item">{{ $specialization->specialization }}</li>
                                @endif

                            @endif
                        </ul>
                    </div>

                </div>
                <div class="itf-card mb-4">
                    <div class="itf-card-header itf-card-header-secondary">
                        <h4 class="itf-card-title">ITF Premium</h4>
                    </div>
                    <div class="itf-card-body">
                        @if ($promo)
                            <h5 class="itf-card-title">You are a {{ $promo->type }} member</h5>
                            <span>{{ $promo->timeToEnd }}</span>
                        @else
                            <p class="itf-card-title itf-card-title-small">

                                Get your premium account and boost your profile performance.
                            </p>
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('user.checkin') }}" class="itf-btn itf-btn-secondary itf-btn-small">Get
                                    Premium</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
