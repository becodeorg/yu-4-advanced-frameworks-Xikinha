<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Spotify;

class PlaylistController extends Controller
{
    // public function __construct()
    // {
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

    // }

    // public function showAmount(Request $request)
    // {
    //     $amount = 3;

    //     return view('playlist', ['amount' => $amount]);

    // }

    public function showPlaylist(Request $request)
    {
        // Get podcasts & number of entries
        $podcasts = DB::table('podcasts')->get()->where('soft_delete', 0);
        $amount = $podcasts->count();
        // $amount = DB::table('podcasts')->count();
        // $uri = $podcasts[0]->track_uri;
        // dd($podcasts, $amount);

        if ($amount == 0) {

            $empty = true;
            // dd($empty);
            return view('playlist', ['empty' => $empty]);

        } else {

            $empty = false;
            // dd($empty);
            return view('playlist', ['empty' => $empty, 'podcasts' => $podcasts]);

        }

    }

    public function softDelete(Request $request)
    {
        DB::table('podcasts')->update(['soft_delete'=>'1']);
        // dd('test');
        return $this->showPlaylist();

    }

    public function addNotes(Request $request)
    {
        $value = [$_POST['id']];
        dd('value');
        // return view('playlist', ['empty' => $empty]);

    }

}