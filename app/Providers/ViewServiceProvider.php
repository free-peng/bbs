<?php

namespace App\Providers;

use App\Http\View\Composers\NavComposer;
use App\Http\View\Composers\LinkComposer;
use App\Http\View\Composers\PopularComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
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
        View::composer("layouts.app", NavComposer::class);
        View::composer("layouts.links", LinkComposer::class);
        View::composer("layouts.popular", PopularComposer::class);
    }
}
