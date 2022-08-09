<?php

namespace App\Http\Controllers;

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
        // Check to get access token
        if (!Cache::has('accessToken')) {
            $this->spotifyClient = new SpotifyWebAPI\Session (
                env('SPOTIFY_CLIENT_ID'),
                env('SPOTIFY_CLIENT_SECRET')
            );

            $scopes = array (
                'playlist-read-private'
            );

            if ($this->spotifyClient->requestCredentialsToken($scopes)) {
                // $tokenExpiryMinutes = floor($this->spotifyClient->getTokenExpiration() - time()/60);
                
                Cache::put(
                    'accessToken',
                    $this->spotifyClient->getAccessToken(),
                    // $tokenExpiryMinutes
                );
            }
        }

        // Use access token to connect to API
        $this->spotifyApi = new SpotifyWebAPI\SpotifyWebAPI();
        $this->spotifyApi->setAccessToken(Cache::get('accessToken'));

        // Get playlist
        // if (!Cache::has('playlist')) {
        //     // Grab random 100 tracks
        //     $offset = rand(0,900);

        //     Cache::put(
        //         'playlist',
        //         $this->spotifyApi->getUserPlaylistTracks('officialcharts','5GEf0fJs9xBPr5R4jEQjtw', [
        //             'offset' => $offset,
        //         ]),
        //         2 //storing it for 2 minutes
        //     );
        // }

        // $this->spotifyChart = Cache::get('playlist');
    
    }

    public function index(Request $request)
    {
        $myPlaylists = $this->spotifyApi->getMyPlaylists()->items;
        print_r($myPlaylists);
    }

}