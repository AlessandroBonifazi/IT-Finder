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
            $dateEnd = Carbon::now()->addHour($promo->duration);
            $user->promos()->attach($idPromo, [
                'endDate'=> $dateEnd,
            ]);
            $lastPromoDateEnd = $user->promos->last()->pivot->endDate;
            dd($lastPromoDateEnd);

            // $lastPromoEndDate =Carbon::parse($lastDate)->addHour($promo->duration);



            // $user->promos()->sync($idPromo);
            // $activePromo = $user->promo;
            // $today = now();
            // if($activePromo){

                // $user->promos()->sync($idPromo)->getTimestamp();
            // }
            // $dateEndLastPromo = $user->promo->created_at;
            // dd($dateEndLastPromo);
            // $promoCount = $user->promo->count();
            // if (!$activePromo) {
                // $dateEnd = Carbon::parse($dateEndLastPromo)->addHour();


                // $user->promo()->sync([
                //   'endDate' => $dateEnd,
                // ]);
            // } else {
                // $lastDateEnd = Carbon::parse($dateEndLastPromo)->addHour($promo->duration);
                // $user->promo()->attach($idPromo, [
                //   'endDate' => $lastDateEnd,
                // ]);
            // }
        }

        return view('auth.confirmed', ['promo' => $promo]);
    }

}
