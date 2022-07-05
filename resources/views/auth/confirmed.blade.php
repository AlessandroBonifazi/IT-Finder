@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-10 col-md-10 col-lg-9 offset-lg-1">
            <h1>
                Your purchase is completed!
            </h1>
            <h5>Your order:</h5>
            <p>Type: {{ $promo->type }}</p>
            <p>Price: {{ $promo->price }} €</p>
            <p>Duration: {{ $promo->duration }} days</p>
        </div>
    </div>
@endsection
