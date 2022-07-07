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

class StoricController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storic()
    {
        //Per richiamare il nome dell'utente
        $user = User::find(Auth::id());
        $promos = $user->promos;
        //Ultima sponsorizzazione
        $lastPromo = (($user->promos->count())-1);

        //Se è già presente una promo attiva
        if($lastPromo>0){
            //Seleziono la tipologia
            $lastPromoType= $user->promos[$lastPromo]->type;
            //Seleziono la durata dell'ultima promo
            $lastPromoDuration = $user->promos[$lastPromo]->duration;

        }



       return view('auth.storic');
    }


}
