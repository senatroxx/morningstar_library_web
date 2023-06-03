<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Vite::useScriptTagAttributes([
        //     'data-turbo-track' => 'reload', // Specify a value for the attribute...
        //     'async' => true, // Specify an attribute without a value...
        //     'integrity' => false, // Exclude an attribute that would otherwise be included...
        // ]);
        // Vite::useScriptTagAttributes([
        //     'data-turbo-track' => 'reload', // Specify a value for the attribute...
        //     'async' => true, // Specify an attribute without a value...
        //     'integrity' => false, // Exclude an attribute that would otherwise be included...
        // ]);

        // Vite::useStyleTagAttributes([
        //     'data-turbo-track' => 'reload',
        // ]);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
