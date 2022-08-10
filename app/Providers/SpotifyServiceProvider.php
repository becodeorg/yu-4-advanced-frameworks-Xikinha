<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Session;
use SpotifyWebAPI;

class SpotifyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */

    public function register()
    {
        $this->app->singleton('SpotifyWebApi\SpotifyWebApi', function ($app) {

            $client = new SpotifyWebApi\SpotifyWebApi;

            $session = new SpotifyWebAPI\Session(
                config('services.spotify.client_id'),
                config('services.spotify.client_secret'),
                config('services.spotify.redirect')
            );

            $scopes = [
                'playlist-read-private',
                'user-read-private',
            ];

            $session->requestCredentialsToken($scopes);

            $accessToken = $session->getAccessToken();

            $client->setAccessToken($accessToken);

            return $client;
        });
    }

    public function boot()
    {
        View::composer('dashboard', function () {
            //
        });
    }
}

