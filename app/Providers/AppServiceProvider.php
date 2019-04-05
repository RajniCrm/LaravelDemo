<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Http\Stripe; // use class reference

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::DefaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
       /* $this->app->singleton('App\Http\Stripe', function(){
            return new \App\Http\Stripe(config('services.stripe.key'), config('app.name'), config('mail.driver'));
        });
        */
        // USE CLASS Stripe REFERENCE
        $this->app->singleton(Stripe::class, function(){
            return new Stripe(config('services.stripe.key'), config('app.name'), config('mail.driver'));
        });
    }
}
