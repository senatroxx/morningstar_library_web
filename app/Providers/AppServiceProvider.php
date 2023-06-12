<?php

namespace App\Providers;

use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\TwitterCard;
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
        SEOTools::macro('webPage', function (string $title, string $description, string $type = 'webpage', array $images = []) {
            SEOMeta::setTitle($title);
            SEOMeta::setDescription($description);
            SEOMeta::setCanonical(request()->url());
            OpenGraph::setDescription($description);
            OpenGraph::setTitle($title);
            OpenGraph::setUrl(request()->url());
            OpenGraph::addImages($images);
            OpenGraph::addProperty('type', $type);
            TwitterCard::setTitle($title);
            TwitterCard::setSite('@morningstarLibrary');
            TwitterCard::setDescription($description);
            TwitterCard::setUrl(request()->url());
            TwitterCard::setImages($images);
            JsonLd::setTitle($title);
            JsonLd::setDescription($description);
            JsonLd::setType($type);
            JsonLd::setUrl(request()->url());
            JsonLd::addImage($images);
        });
    }
}
