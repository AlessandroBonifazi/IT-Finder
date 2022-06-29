<?php

namespace App\Providers;
use Braintree\Configuration;

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


Configuration::environment(env("sandbox"));
Configuration::merchantId(env('8frhgk62nv9g3cwn'));
Configuration::publicKey(env('nr8p24krsnfcjd38'));
Configuration::privateKey(env('2a47102c4a069e70952ae73873537993'));

    }
}
