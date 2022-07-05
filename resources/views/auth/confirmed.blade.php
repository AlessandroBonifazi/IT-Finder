@extends('layouts.app')
@section('content')
<div>
    <h1>
        Your purchase is completed!
    </h1>
    <p>Your order {{$promo->price}}</p>
</div>
@endsection
