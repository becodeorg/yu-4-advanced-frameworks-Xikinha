<?php

namespace App\Http\Controllers;

// require 'vendor/autoload.php';

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use SpotifyWebAPI;

class ApiController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    private $spotifyApi;
    private $spotifyClient;

    public function __construct(Request $request)
    {
        // Set up API connection - Authorization Using the Client Credentials Flow
        
        // Use Spotify Developer App credentials
        $this->spotifyClient = new SpotifyWebAPI\Session (
                env('SPOTIFY_CLIENT_ID'),
                env('SPOTIFY_CLIENT_SECRET'),
                // env('SPOTIFY_REDIRECT_URI')
        );

        $this->spotifyClient->requestCredentialsToken();
        $accessToken = $this->spotifyClient->getAccessToken();

        $this->spotifyApi = new SpotifyWebAPI\SpotifyWebAPI();
        $this->spotifyApi->setAccessToken($accessToken);

    }

    public function index(Request $request)
    {
        $test = $this->spotifyApi->getTrack('7EjyzZcbLxW7PaaLua9Ksb');
        // $test = $this->spotifyApi::show('07SjDmKb9iliEzpNcN2xGD')->get();
        print_r(
            $test
            // $this->spotifyApi->getTrack('3CeHl9feqxRIV99dtatz6W')
            // $this->spotifyApi->getShow('07SjDmKb9iliEzpNcN2xGD') ERROR: non-existing ID
        );
    }

}