<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('isactive', function ($routeName) {
            $currentRoute = \Route::current();
            if ($currentRoute->action['as'] == $routeName) {
                return 'menu-active';
            }
            return "";
        });

        Blade::directive('isactiveandopen', function ($routeName) {
            $currentRoute = \Route::current();
            if (strpos($currentRoute->action['as'], $routeName) !== false) {
                return "menu-active";
            }
            return "";
        });
    }
}
