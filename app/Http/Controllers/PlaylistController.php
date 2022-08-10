<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Providers\SpotifyServiceProvider;

class PlaylistController extends Controller
{

    public function __construct(SpotifyWebApi\SpotifyWebApi $spotify)
    {
        $this->spotify = \App::make('Spotify');

        dd($this->spotify);
    }
}