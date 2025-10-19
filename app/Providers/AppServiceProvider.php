<?php

namespace App\Providers;

use App\Http\ViewComposers\NavbarComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        // View::composer('partials.navbar', NavbarComposer::class);
        View::composer(['partials.header', 'partials.footer','partials.navbar'], \App\Http\ViewComposers\NavbarComposer::class);

    }
    
}
