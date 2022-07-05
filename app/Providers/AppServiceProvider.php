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
                    'merchantId' => 'kvjtqn9dgdm4vj37',
                    'publicKey' => 'm6rdtrmx3qpjh7z8',
                    'privateKey' => '831bf5b17419d7bc1c272b3f62179377',
                ],
            );
        });
    }
}
