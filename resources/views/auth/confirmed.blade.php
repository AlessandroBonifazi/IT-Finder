@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-10 offset-sm-2 col-md-6 offset-md-0 col-lg-6 offset-lg-1">
            <div class="itf-card">
                <div class="itf-card-header">
                    <h2 class="itf-card-title">Your purchase is completed!</h2>
                </div>
                <div class="itf-card-body">
                    <h5>Your order:</h5>
                    <p>Type: {{ $promo->type }}</p>
                    <p>Price: {{ $promo->price }} €</p>
                    <p>Duration: {{ $promo->duration }} days</p>
                </div>
            </div>
        </div>
    </div>
@endsection
