@extends('layouts.app')

@section('content')
    <div class="order-sm-2 order-md-1 col-sm-10 col-md-6 col-lg-8">
        <div class="row">
            {{-- Promo --}}
            <div style="height: 500px;" class="col-md-12 col-lg-6 grid-margin stretch-card my-3 overflow-auto h-100">
                <div class="card">
                    <div class="card-body py-5 overflow-auto">
                        {{-- title --}}
                        <h5 class="card-title">Promo</h5>
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
@endsection
