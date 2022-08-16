<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Podcast;
use Spotify;

class DashboardController extends Controller
{
    // Search track on Spotify & show search result
    public function search(Request $request)
    {
        $query = $request->input('query');
        $track = Spotify::searchTracks($query)->get();
        $track_title = $track['tracks']['items'][0]['name'];
        $artist = $track['tracks']['items'][0]['artists'][0]['name'];
        $image_url = $track['tracks']['items'][0]['album']['images'][0]['url'];
        $track_uri = $track['tracks']['items'][0]['uri'];
        // dd($query, $track, $artist, $track_title, $image_url, $track_uri);

        return view('search', ['track_title' => $track_title, 'artist' => $artist, 'image_url' => $image_url, 'track_uri' => $track_uri]);
    }

    // Get random track to display suggestion
    public function showRandom()
    {
        // No tracks available for podcast playlist
        // $playlist = Spotify::playlist('550brlqlMd2hTvmV3FW6O3')->get();
        // Tracks available for song playlist
        // $playlist = Spotify::playlist('51B1RYepg13jOB73HfjXbJ')->get();
        // $episode = $playlist['tracks']['items'][0];
        // dd($playlist, $episode);
        // Id not working
        // $podcast = Spotify::show('1VXcH8QHkjRcTCEd88U3ti')->get();

        // Get song playlist
        $playlist = Spotify::playlist('37i9dQZF1DWYey22ryYM8U')->get();
        $track_id = rand(0,50);
        $track = $playlist['tracks']['items'][$track_id];
        $track_title = $track['track']['name'];
        $artist = $track['track']['artists'][0]['name'];
        $image_url = $track['track']['album']['images'][0]['url'];
        $track_uri = $track['track']['uri'];
        // dd($track, $artist, $track_title, $image_url, $track_uri);
        
        return view('dashboard', ['track_title' => $track_title, 'artist' => $artist, 'image_url' => $image_url, 'track_uri' => $track_uri]);
    } 

    // Add track to database
    public function storeTrack(Request $request)
    {
        // dd($request);
        
        $podcast = new Podcast;
        $podcast->track = $request->input('track_title');
        $podcast->artist = $request->input('artist');
        $podcast->image_url = $request->input('image_url');
        $podcast->track_uri = $request->input('track_uri');
        $podcast->notes = "-";
        $podcast->soft_delete = 0;
        $podcast->save();
     
        return $this->showRandom();
    }

}