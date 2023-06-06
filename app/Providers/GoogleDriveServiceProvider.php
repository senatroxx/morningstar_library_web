<?php

namespace App\Providers;

use Google\Client;
use Google\Service\Drive;
use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Support\ServiceProvider;
use League\Flysystem\Filesystem;
use League\Flysystem\Visibility;
use Masbug\Flysystem\GoogleDriveAdapter;
use Storage;

class GoogleDriveServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Storage::extend('google', function ($app, $config) {
            $client = new Client();
            $client->setClientId($config['clientId']);
            $client->setClientSecret($config['clientSecret']);
            $client->refreshToken($config['refreshToken']);
            $service = new Drive($client);

            $options = [];
            if (isset($config['teamDriveId'])) {
                $options['teamDriveId'] = $config['teamDriveId'];
            }
            $options['useDisplayPath'] = true;

            $adapter = new GoogleDriveAdapter($service, $config['folderId'], $options);
            // phpfmt:disable
            $filesystem = new Filesystem($adapter, [
                ...$config,
                \League\Flysystem\Config::OPTION_VISIBILITY => Visibility::PUBLIC ,
            ]);
            // phpfmt:enable

            return new FilesystemAdapter($filesystem, $adapter);
        });
    }
}
