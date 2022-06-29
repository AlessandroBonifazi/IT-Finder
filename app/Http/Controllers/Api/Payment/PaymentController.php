<?php

namespace App\Http\Controllers\Api\Payment;

use Braintree\Gateway;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Promo;

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

    public function makePayment(Request $request, Gateway $gateway){
        $promo = Promo::find($request->promo);

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

