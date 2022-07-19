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
    public function checkIn()
    {
        $promos = Promo::all();
        return view("auth.checkin", compact("promos"));
    }

    public function checkOut(Gateway $gateway, $id)
    {
        // ! this was the thing that was causing the error
        // ! keep in mind that payment is a many step process so the errors con be in different places
        // $user = Auth::user();
        // $user->promos()->sync($id);
        // $user->promos()->create([
        //     "promo_id" => $id,
        // ]);
        return view("auth.checkout", [
            "id" => $id,
            "token" => $gateway->clientToken()->generate(),
            "promo" => Promo::find($id),
        ]);
    }

    public function payment(Request $request, Gateway $gateway)
    {
        // $idPromo = $request->id;
        $promo = Promo::find($request->id);
        // dd($promo);
        $user = User::find(Auth::id());
        // $activePromoNumber = $user->promos->count();
        $amount = $promo->price;
        $nonce = $request->payment_method_nonce;
        $promoType = $promo->type;
        $result = $gateway->transaction()->sale([
            "amount" => $amount,
            "paymentMethodNonce" => $nonce,
            "options" => ["submitForSettlement" => true],
        ]);
        if ($result->success) {
            $endDate = Carbon::now()->addDays($promo->duration);
            $promo->users()->attach($user->id, [
                "endDate" => $endDate, // ! be constant with variables names, if all the columns have name in snake_case, then use snake_case for all the new columns too
            ]);
        }

        return view("auth.confirmed", ["promo" => $promo]);
    }
}
