<?php

use App\User;
use App\Promo;
use Carbon\Carbon;
use Braintree\Gateway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get("/register", "Auth\RegisterController@showRegistrationForm")->name(
    "register"
);

Route::middleware("auth")
    ->namespace("User")
    ->name("user.")
    ->prefix("user")
    ->group(function () {
        Route::put(
            "/update-profile/{id}",
            "UserController@updateProfile"
        )->name("update-profile");
        Route::get(
            "/complete-registration",
            "UserController@completeRegistration"
        )->name("complete-registration");
        Route::get("/dashboard", "UserController@dashboard")->name("dashboard");
        Route::get("/profile", "UserController@profile")->name("profile");
        Route::get("/{id}/edit", "UserController@edit")->name("edit");
        Route::get("/messages", "UserController@getMessages")->name("messages");
        Route::get("/logout", "UserController@logout")->name("logout");
        // CheckIn
        Route::get("/checkin", "UserController@promos")->name("checkin");
        // CheckOut
        Route::get("/checkout/{id}", "UserController@checkOut")->name("checkout");
        //Payment
        Route::get('/confirmed', function () {
            return view('auth.confirmed');
          })->name('confirmed');

        Route::put('/payment', function(Request $request, Gateway $gateway){

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
              'options' => [
                'submitForSettlement' => true
              ]
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

        })->name('payment');


    });

Route::get("{any?}", function () {
    return view("guest.home");
})->where("any", ".*");
