@extends('layouts.app')

@section('content')


    <div class="container">


            <h3 class="text-center">Choose your Promo</h3>
                <div class="row justify-content-center">

                        @foreach ($promos as $promo)
                        <div class="col-12 col-sm-4 my-2">
                                <div class="itf-card p-3">
                                        <h4 class=" text-center" style="font-family:$ff-heading">{{ $promo->type }}</h4>
                                        <p class="text-center">Boost your presence on the platform for {{ $promo->duration }} day.</p>
                                        <p class="font-weight-light text-center" style="font-size: 4rem">  {{ $promo->price }} € </p>
                                        <div class="d-flex justify-content-center">

                                                <a class="itf-btn itf-btn-primary" href="{{ route('user.checkout', $promo->id) }}">I want this!</a>

                                        </div>

                                </div>
                            </div>
                        @endforeach

                </div>





    </div>
</div>


@endsection

<style lang="scss">




</style>
