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
                            @if (!$is_premium)
                                <div class="itf-card-info-bar">
                                    <a href="{{ route('user.checkin') }}"
                                        class="itf-card-title itf-card-title-small">Upgrade
                                        your profile to receive
                                        more reviews</a>
                                </div>
                            @endif
                            <div class="row itf-card-body py-5">
                                <div class="col-6 col-md-6 col-lg-4">
                                    <div class="text-center">
                                        <h2 class="stat-number">{{ round($avg_rating, 1) }}</h2>
                                        <h5 class="stat-title">Valutation</h5>
                                    </div>
                                </div>
                                <div class="col-6 col-md-6 col-lg-4">
                                    <div class="text-center">
                                        <h2 class="stat-number">{{ $totalReviews }}</h2>
                                        <h5 class="stat-title">Total Reviews</h5>
                                    </div>
                                </div>
                                <div class="col-6 col-md-6 col-lg-4">
                                    <div class="text-center">
                                        <h2 class="stat-number">{{ $totalMessages }}</h2>
                                        <h5 class="stat-title">Total Messages</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    {{-- Messaggi --}}
                    <div class="col-md-12 col-xl-6 mb-4">
                        <div class="itf-card">
                            <div class="itf-card-header">
                                <h4 class="itf-card-title">Last Messages</h4>
                            </div>
                            <div class="itf-card-body">
                                @if ($messages->count() > 0)
                                    @foreach ($messages as $message)
                                        <div class="itf-message-item">
                                            <div class="itf-message-item-header">
                                                @if ($message->user_name)
                                                    <h5 class="itf-message-name">{{ $message->user_name }}</h5>
                                                @else
                                                    <h5 class="itf-message-name">Anonymous</h5>
                                                @endif
                                                @if ($message->created_at)
                                                    <span
                                                        class="itf-message-date">{{ $message->created_at->diffForHumans() }}</span>
                                                @endif
                                            </div>
                                            <div class="itf-message-item-body">
                                                <p class="itf-message-content">
                                                    {{ $message->content }}
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="itf-message-item">
                                        <div class="itf-message-item-header">
                                            <h5 class="itf-message-name">No messages</h5>
                                        </div>
                                        <div class="itf-message-item-body">
                                            <p class="itf-message-content">
                                                You have no messages yet.
                                            </p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    {{-- Recensioni --}}
                    <div class="col-md-12 col-xl-6 mb-4">
                        <div class="itf-card">
                            <div class="itf-card-header">
                                <h4 class="itf-card-title">Last Reviews</h4>
                            </div>
                            {{-- title --}}
                            <div class="itf-card-body">
                                @if ($reviews->count() > 0)
                                    @foreach ($reviews as $review)
                                        <div class="itf-review-item">
                                            <div class="itf-review-item-header">
                                                <div class="d-flex align-items-center">

                                                    @if ($review->user_name)
                                                        <h5 class="itf-review-name">{{ $review->user_name }} </h5>
                                                    @else
                                                        <h5 class="itf-review-name">Anonymous </h5>
                                                    @endif
                                                    <div class="itf-star-container">
                                                        @for ($i = 0; $i < $review->valutation; $i++)
                                                            <div class="itf-star-fill">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                                </svg>
                                                            </div>
                                                        @endfor
                                                        @for ($i = 0; $i < 5 - $review->valutation; $i++)
                                                            <div class="itf-star-empty">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor" class="bi bi-star"
                                                                    viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                                                </svg>
                                                            </div>
                                                        @endfor
                                                    </div>
                                                </div>
                                                @if ($review->created_at)
                                                    <span
                                                        class="itf-review-date">{{ $review->created_at->diffForHumans() }}</span>
                                                @endif
                                            </div>
                                            <div class="itf-review-item-body">
                                                <p class="itf-review-content">
                                                    {{ $review->content }}
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="itf-review-item">
                                        <div class="itf-review-item-header">
                                            <h5 class="itf-review-name">No reviews</h5>
                                        </div>
                                        <div class="itf-review-item-body">
                                            <p class="itf-review-content">
                                                You have no reviews yet.
                                            </p>
                                        </div>
                                    </div>
                                @endif
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

                            <div class="itf-card-img">
                                @if (isset($user->img_path))
                                    @if (str_contains($user->img_path, 'licdn.com'))
                                        <img src="{{ $user->img_path }}" alt="profile-img">
                                    @else
                                        <img src="{{ asset('./storage/' . $user->img_path) }}" alt="profile-img" />
                                    @endif
                                @else
                                    <img src="https://loremflickr.com/640/360" alt="">
                                @endif


                            </div>
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
                                @foreach ($user->specializations as $specialization)
                                    <li class="list-group-item">{{ $specialization->specialization }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>

                </div>
                <div class="itf-card mb-4">
                    <div class="itf-card-header itf-card-header-secondary">
                        <h4 class="itf-card-title">ITF Premium</h4>
                    </div>
                    <div class="itf-card-body">
                        @if ($is_premium)
                            <h5 class="itf-card-title">You are a {{ $user->promo->type }} member</h5>
                            <span>{{ $user->promo->timeToEnd }}</span>
                        @else
                            <p class="itf-card-title itf-card-title-small">

                                Get your premium account and boost your profile performance.
                            </p>
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('user.checkin') }}"
                                    class="itf-btn itf-btn-secondary itf-btn-small">Get
                                    Premium</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
