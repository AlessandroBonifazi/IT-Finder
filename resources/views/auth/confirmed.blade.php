@extends('layouts.app')
@section('content')
    <div class="col-12">
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
@endsection
