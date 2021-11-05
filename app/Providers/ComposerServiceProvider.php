<?php

namespace App\Providers;

use App\Models\ReviewCategory;
use Illuminate\View\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
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
        view()->composer(['includes.header'], function (View $view) {
            $view->with([
                'reviewCategories' => ReviewCategory::all(),
            ]);
        });
    }
}
