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
                    'merchantId' => '3r68z9rvrpyp4qq2',
                    'publicKey' => 'hxmxqns5s6rjnr2t',
                    'privateKey' => '8610b912fd650ffe192d7de2b81a621a',
                ],
            );
        });
    }
}
