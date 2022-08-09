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
    private $spotifyChart;

    public function __construct(Request $request)
    {
        //
        $this->spotifyApi = new SpotifyWebAPI\SpotifyWebAPI();

        $this->spotifyClient = new SpotifyWebAPI\Session (
                env('SPOTIFY_CLIENT_ID'),
                env('SPOTIFY_CLIENT_SECRET'),
                env('SPOTIFY_REDIRECT_URI')
        );

        if (isset($_GET['code'])) {
            $this->spotifyClient->requestCredentialsToken($_GET['code']);

            $accessToken = $this->spotifyClient->getAccessToken();
            $this->spotifyApi->setAccessToken($accessToken);

            print_r($this->spotifyApi->me());
        } else {
            $options = [
                'scope' => [
                    'user-read-email',
                ],
            ];
        
            header('Location: ' . $this->spotifyClient->getAuthorizeUrl($options));
            die();
        }

    }

    public function index(Request $request)
    {
        $myPlaylists = $this->spotifyApi->getMyPlaylists()->items;
        print_r($myPlaylists);
    }

}