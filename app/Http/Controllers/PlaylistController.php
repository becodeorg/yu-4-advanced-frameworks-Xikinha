<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Podcast;
use Spotify;

class PlaylistController extends Controller
{
    public function index()
    {
        // Get podcasts & number of entries
        $podcasts = DB::table('podcasts')->where('soft_delete', 0)->get();
        $amount = $podcasts->count();
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

    public function show(Request $request)
    {
        // $trim = trim($request->fullUrl(), 'http://127.0.0.1:8000/show');
        // $id = trim($trim, '?=');
        $id = trim(parse_url($request->fullUrl())['query'], '=');
        $podcast = DB::table('podcasts')->get()->where('id', $id);
        // dd($id, $podcast);

        $podcast_track = DB::table('podcasts')->get()->where('id', $id)->pluck('track');
        $podcast_artist = DB::table('podcasts')->get()->where('id', $id)->pluck('artist');
        $podcast_image = DB::table('podcasts')->get()->where('id', $id)->pluck('image_url');
        $podcast_uri = DB::table('podcasts')->get()->where('id', $id)->pluck('track_uri');
        $podcast_notes = DB::table('podcasts')->get()->where('id', $id)->pluck('notes');

        $track = $podcast_track[0];
        $artist = $podcast_artist[0];
        $image_url = $podcast_image[0];
        $track_uri = $podcast_uri[0];
        $notes = $podcast_notes[0];

        // dd($podcast, $podcast_track, $track, $artist, $image_url, $track_uri, $notes);
        
        return view('show', ['track' => $track, 'artist' => $artist, 'image_url' => $image_url, 'track_uri' => $track_uri, 'notes' => $notes]);
    } 

    public function edit(Request $request)
    {
        $id = trim(parse_url($request->fullUrl())['query'], '=');
        $podcast = DB::table('podcasts')->where('id', $id)->get();

        $track = $podcast[0]->track;
        $artist = $podcast[0]->artist;
        $notes = $podcast[0]->notes;

        // dd($id, $podcast, $track, $artist, $notes);
        
        return view('edit', ['track' => $track, 'artist' => $artist, 'notes' => $notes]);
    } 

    public function storeNotes(Request $request)
    {
        // dd($request);

        $track = $request->input('track');
        $artist = $request->input('artist');
        $notes = $request->notes;
        // dd($track, $artist, $notes);

        // $podcast = DB::table('podcasts')->where('track', $track)->where('artist', $artist)->get();
        // dd($podcast);
        DB::table('podcasts')->where('track', $track)->where('artist', $artist)->update(['notes' => $notes]);
        
        return view('home');

    }

    public function softDelete(Request $request)
    {
        $id = trim(parse_url($request->fullUrl())['query'], '=');
        // $podcast = DB::table('podcasts')->where('id', $id)->get();
        // dd($id, $podcast);
        DB::table('podcasts')->where('id', $id)->update(['soft_delete'=>1]);

        return view('home');

    }

}