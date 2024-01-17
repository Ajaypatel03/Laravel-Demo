<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use illuminate\pagination\Paginator;

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
      //Paginator::useBootstrapFive();
       Paginator::defaultView('vendor.pagination.simple-bootstrap-4');
       Paginator::defaultSimpleView('vendor.pagination.simple-bootstrap-4');
    }
}
