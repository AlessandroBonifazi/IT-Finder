@extends('layouts.app')

@section('content')
    <div class="col-12 col-lg-11 mt-3">
        <h3 class="text-center">Choose your Promo</h3>
        <div class="row">
            @foreach ($promos as $promo)
                <div class="col-12 col-sm-4 my-2">
                    <div class="itf-card">
                        {{-- title --}}
                        <div class="itf-card-header">
                            <h5 class="itf-card-title">{{ $promo->type }}</h5>
                        </div>
                        <div class="itf-card-body">
                            <p class="text-center">Boost your presence on the platform for {{ $promo->duration }} day.</p>
                            {{-- ---------------------------------------------------------------------- Scusate \v/ --}}
                            <p class="font-weight-light text-center" style="font-size: 4rem"> {{ $promo->price }}9 € </p>
                            <div class="d-flex justify-content-center">
                                <a class="itf-btn itf-btn-primary" href="{{ route('user.checkout', $promo->id) }}">I want
                                    this!</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
