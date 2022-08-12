<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Podcast;

class DashboardController extends Controller
{
    // Call Spotify API info for search term
    public function showSearch()
    {
        // Get tracks with specific title
        // $test = Spotify::searchTracks('TED Talks Daily')->get();
        // dd($test);
        
        // Get playlist
        // $test = Spotify::playlist('51B1RYepg13jOB73HfjXbJ')->get();
        // dd($test);

        // Playlist name
        // dd($test['name']);

        // Playlist image
        // dd($test['images'][0]);

        // Track name
        // dd($test['tracks']['items'][0]['track']['name']);

        // Artist name
        // dd($test['tracks']['items'][0]['track']['artists'][0]['name']);

        // Track URI
        // dd($test['tracks']['items'][0]['track']['uri']);

        // Album image
        // dd($test['tracks']['items'][0]['track']['album']['images'][0]['url']);

        // dd($test['tracks']['items'][2]['track']['album']['images'][0]['url'], $test['tracks']['items'][2]['track']['name'], $test['tracks']['items'][2]['track']['artists'][0]['name'], $test['tracks']['items'][2]['track']['uri']);

        // Get episodes of show
        // TED Talks Daily https://open.spotify.com/show/1VXcH8QHkjRcTCEd88U3ti
        // $podcast = Spotify::show('1VXcH8QHkjRcTCEd88U3ti')->get();

        // dd($podcast);

        // Podcast name
        // dd($test['name']);

    }

    // Display dashboard page
    public function showDashboard(Request $request)
    {
        return view('dashboard');
    }

    // Display playlist page
    public function showPlaylist(Request $request)
    {
        return view('playlist');
    }

    // Add podcast episode to database
    public function store(Request $request)
    {
        $request->validate([
            'track' => 'required',
            'artist' => 'required',
            'image_url' => 'required',
            'track_uri' => 'required',
        ]);
    
        Podcast::create($request->all());
     
        return view('dashboard');
    }

}