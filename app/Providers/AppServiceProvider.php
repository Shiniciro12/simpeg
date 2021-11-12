<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Identitas;
use Illuminate\Support\Facades\Gate;

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
        Paginator::useBootstrap();

        //Gate for role
        Gate::define('root', function (Identitas $identitas) {
            return $identitas->hasRole('root');
        });
        Gate::define('bkppd', function (Identitas $identitas) {
            return $identitas->hasRole('bkppd');
        });
        Gate::define('unit-kerja', function (Identitas $identitas) {
            return $identitas->hasRole('unit-kerja');
        });
        Gate::define('client', function (Identitas $identitas) {
            return $identitas->hasRole('client');
        });
    }
}
