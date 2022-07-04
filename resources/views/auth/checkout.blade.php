@extends('layouts.app')
{{-- @dd($user); --}}
@section('content')

<div id="dropin-container"></div>
<button id="submit-button" class="button button--small button--green">Purchase</button>
<script>
    var button = document.querySelector('#submit-button');

braintree.dropin.create({
  authorization: 'sandbox_g42y39zw_348pk9cgf3bgyw2b',
  selector: '#dropin-container'
}, function (err, instance) {
  if (err) {
    // An error in the create call is likely due to
    // incorrect configuration values or network issues
    return;
  }

  button.addEventListener('click', function () {
    instance.requestPaymentMethod(function (err, payload) {
      if (err) {
        // An appropriate error will be shown in the UI
        return;
      }

      // Submit payload.nonce to your server
    });
  })
});
</script>
@endsection
