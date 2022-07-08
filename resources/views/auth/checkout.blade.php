@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-sm-10 col-md-10 col-lg-9 offset-lg-1">
            <div class="row">
                {{-- Promo --}}
                <div style="height: 500px; " class="col-md-12 col-lg-6 grid-margin stretch-card my-3 overflow-auto h-100">
                    <div class="itf-card">
                        <div class="itf-card-header">
                            {{-- title --}}
                            <h5 class="itf-card-title">You choose Type: {{ $promo->type }}</h5>
                        </div>
                        <div class="itf-card-body">
                            <li class="list-group-item w-75">
                                <p>Duration: {{ $promo->duration }} days</p>
                                Price: {{ $promo->price }}$
                            </li>
                            <p>Continue here for the payment or
                            <div class="itf-btn itf-btn-primary w-50 display-4 p-1 text-center">
                                <a class="text-white" href="{{ route('user.checkin') }}">Go Back</a>

                            </div>
                            </p>
                            <form id="payment-form" action="{{ route('user.payment') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <section>
                                    <label for="amount">
                                        <div class="input-wrapper amount-wrapper">
                                            <input type="hidden" id="amount" name="amount" min="1"
                                                placeholder="amount" value="{{ $promo->price }}" readonly>
                                        </div>
                                    </label>

                                    <input type="hidden" name="id" value="{{ $id }}">


                                    <input type="hidden" name="token" value="{{ $token }}">


                                    <div class="bt-drop-in-wrapper">
                                        <div id="bt-dropin"></div>
                                    </div>
                                    <input type="hidden" name="payment_method_nonce" value="fake-valid-visa-nonce"
                                        id="nonce">
                                </section>
                                <div class="d-flex w-100 justify-content-between align-item-baseline">
                                    <button class="button btn btn-success" type="submit"><span>BUY</span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://js.braintreegateway.com/web/dropin/1.31.0/js/dropin.min.js"></script>

    <script>
        var form = document.querySelector('#payment-form');
        var client_token = "{{ $token }}";
        braintree.dropin.create({
            authorization: client_token,
            selector: '#bt-dropin',
        }, function(createErr, instance) {
            if (createErr) {
                console.log('Create Error', createErr);
            }
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                instance.requestPaymentMethod(function(err, payload) {
                    if (err) {
                        console.log('Request Payment Method Error', err);
                        return;
                    }
                    //Add the nonce to the form and submit
                    document.querySelector('input[name="payment_method_nonce"]').value = payload
                        .nonce;
                    form.submit();
                });
            });
        });
    </script>
@endsection
