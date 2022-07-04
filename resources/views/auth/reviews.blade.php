@extends('layouts.app')

@section('content')
    <div class="order-sm-2 order-md-1 col-sm-10 col-md-6 col-lg-8">
        <div class="row">

            {{-- Messaggi --}}
            <div class="col-md-12 col-lg-6 grid-margin stretch-card my-3">
                <div class="card">
                    <div class="card-body py-5">
                        {{-- title --}}
                        <h5 class="card-title">Reviews</h5>

                        @foreach ($reviews as $review)
                            <ul class="list-group list-group-horizontal my-1">
                                <li class="list-group-item">
                                    <h5>{{ $review->user_name }}</h5>
                                    <span>{{ $review->valutation }}</span>
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
@endsection
