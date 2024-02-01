<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Spatie\Fractal\Facades\Fractal;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //        Fractal::macro('getData', function ($stats) {
        //
        //            return $this->addMeta(['getData' => $stats]);
        //        });
    }
}
