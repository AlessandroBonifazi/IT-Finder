@extends('layouts.app')

@section('content')
    {{-- Reviews --}}
    <div class="col-12">
        <div class="itf-card">
            {{-- title --}}
            <div class="itf-card-header">
                <h5 class="itf-card-title">{{ $reviews->total_reviews }} received reviews</h5>
            </div>
            @if (!$is_premium)
                <div class="itf-card-info-bar">
                    <a href="{{ route('user.checkin') }}" class="itf-card-title itf-card-title-small">Upgrade
                        your profile to receive
                        more reviews</a>
                </div>
            @endif
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
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                </svg>
                                            </div>
                                        @endfor
                                        @for ($i = 0; $i < 5 - $review->valutation; $i++)
                                            <div class="itf-star-empty">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                    <path
                                                        d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                                </svg>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                                @if ($review->created_at)
                                    <span class="itf-review-date">{{ $review->created_at->diffForHumans() }}</span>
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
                            <div class="d-flex align-items-center">
                                <h5 class="itf-review-name">No reviews yet</h5>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

    </div>
@endsection
