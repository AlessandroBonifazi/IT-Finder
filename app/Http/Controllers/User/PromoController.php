<?php

namespace App\Http\Controllers\User;
use \Braintree\Gateway;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use App\Promo;

class PromoController extends Controller
{
    //
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
        $activePromo = $user->promo;
        $amount = $promo->price;
        $nonce = $request->payment_method_nonce;
        $sponsorshipName = $promo->name;
        $result = $gateway->transaction()->sale([
          'amount' => $amount,
          'paymentMethodNonce' => $nonce,
          'options' => ['submitForSettlement' => true]
        ]);
        if ($result->success) {
            $user->promos()->sync($idPromo);
            $activePromo = $user->promo;
            if($activePromo){
                $promoCount = $user->promo->count();
                if (!$activePromo) {
                    $dateEnd = Carbon::now()->addHour($promo->duration);
                    $user->promo()->attach($idPromo, [
                      'endDate' => $dateEnd,
                    ]);
                } else {
                    $dateEndLastPromo = $user->promo->last()->pivot->endDate;
                    $lastDateEnd = Carbon::parse($dateEndLastPromo)->addHour($promo->duration);
                    $user->promo()->attach($idPromo, [
                      'endDate' => $lastDateEnd,
                    ]);
                }
            }
        }
        return view('auth.confirmed', ['promo' => $promo]);
    }
}
