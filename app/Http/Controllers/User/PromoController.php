<?php

namespace App\Http\Controllers\User;
use App\User;
use App\Promo;
use Carbon\Carbon;
use Braintree\Gateway;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


class PromoController extends Controller
{
    //
    private $db;
    public function checkIn(){
        $promos=Promo::all();
        return view('auth.checkin', compact('promos'));
    }

    public function checkOut(Gateway $gateway, $id){
        $user = Auth::user();
        $user->promos()->sync($id);
        // $user->promos()->create([
        //     "promo_id" => $id,
        // ]);
        return view('auth.checkout', [
            "id" => $id,
            "token" => $gateway->clientToken()->generate(),
            "promo" => Promo::find($id)
          ]);
    }

    public function payment(Request $request, Gateway $gateway) {
        $idPromo = $request->id;
        $promo = Promo::find($idPromo);
        $user = User::find(Auth::id());
        $activePromo = $user->promos->count();
        $amount = $promo->price;
        $nonce = $request->payment_method_nonce;
        $promoType = $promo->type;
        $result = $gateway->transaction()->sale([
          'amount' => $amount,
          'paymentMethodNonce' => $nonce,
          'options' => ['submitForSettlement' => true]
        ]);
        if ($result->success) {

                if($activePromo==0){

                    $endDate = Carbon::now()->addHour($promo->duration);

                    $user->promos()->attach($idPromo, [
                        'endDate'=> $endDate,
                    ]);

                }else{
                    $lastPromoDateEnd = $user->promos->last()->pivot->endDate;
                    $lastEndDate = Carbon::parse($lastPromoDateEnd)->addHour($promo->duration);
                    $user->promos()->attach($idPromo, [
                      'endDate' => $lastEndDate,
                    ]);

                }
        }

        return view('auth.confirmed', ['promo' => $promo]);
    }

}
