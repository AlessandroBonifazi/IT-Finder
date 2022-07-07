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


class StoricController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storic(Request $request, Gateway $gateway)

    {
        $idPromo = $request->id;
        $promo = Promo::find($idPromo);

        //Per richiamare il nome dell'utente
        $user = User::find(Auth::id());
        $promos = $user->promos;
        // dd($promos);

        //Ultima sponsorizzazione
        $lastPromo= (($user->promos->count())-1);
        // dd($lastPromo);


        //Se è già presente una promo attiva
        if($lastPromo>0){
            //Seleziono la tipologia
            $lastPromoType= $user->promos[$lastPromo]->type;
            //Seleziono la durata dell'ultima promo
            $lastPromoDuration = $user->promos[$lastPromo]->duration;

            //Data scadenza
            $lastEndDatePromo = $user->promos[$lastPromo]->pivot->endDate;
            $lastEndDate = Carbon::parse($lastEndDatePromo)->addHour($lastPromoDuration);
            $user->promos()->attach($idPromo, [
                'endDate' => $lastEndDate,
              ]);
            // dd($lastEndDate);

        }else{
            $lastPromoType = "";
            $lastPromoDuration = "";
            $lastEndDate = "";
        }
       return view('auth.storic',compact('lastPromoType', 'lastPromoDuration','lastEndDate', 'lastPromo','promos','user','lastEndDatePromo'));
    }


}
