<?php

namespace App\Providers;
use Braintree\Gateway;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        $this->app->singleton(Gateway::class, function($app){
            return new Gateway(
                [
                    'environment'=>'sandbox',
                    'merchantId' => '8frhgk62nv9g3cwn',
                    'publicKey' => 'nr8p24krsnfcjd38',
                    'privateKey' => '2a47102c4a069e70952ae73873537993',
                ],
            );
        });
    }
}
