<?php

namespace App\Http\Controllers\Api\Payment;

use App\Promo;
use Braintree\Gateway;
use Illuminate\Http\Request;
use App\Http\Requests\Orders\OrderRequest;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function generate(Request $request, Gateway $gateway){
        $token = $gateway->clientToken()->generate();
        $data = [
            'success'=>true,
            'token' => $token
        ];
        return response()->json($data,200);
    }

    public function makePayment(OrderRequest $request, Gateway $gateway){

        $promo = Promo::find($request->id);

        $result = $gateway->transaction()->sale([
            'amount' => $promo->price,
            'paymentMethodNonce' => $request->token,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if($result->success){
            $data = [
                'success' => true,
                'message' => "Transazione eseguita con Successo!"
            ];
            return response()->json($data,200);
        }else{
            $data = [
                'success' => false,
                'message' => "Transazione Fallita!!"
            ];
            return response()->json($data,401);
        }

    }

}

