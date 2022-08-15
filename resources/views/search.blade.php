@extends('components/layout')

@section('main')

    @auth

        <div class="w-screen inline-block">
            <div class="float-left mt-10 mb-4 ml-16">
                <h1 class="text-3xl">Search result</h1>
            </div>
            <div class="float-right mt-12 mb-4 mr-16">
                <a class="rounded-md bg-black px-4 py-2 text-white hover:bg-yellow-300 hover:text-black" href="{{ route('dashboard') }}">Back to search</a>
            </div>
        </div>

        <div class="flex flex-wrap mt-0 ml-16 mr-16 mb-8 justify-center">
            <div class="w-72 m-2 mb-8 bg-gradient-to-b from-black via-black rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                <form method="POST" action="{{ route('storeTrack') }}">
                    @csrf
                    <div class="object-center mt-4">
                        <img class="rounded-lg w-40 mx-auto" src="{{ $image_url }}" alt="Podcast image">
                        <input type="hidden" id="imageUrl" name="image_url" value="{{ $image_url }}">
                    </div>    
                    <strong><p class="ml-4 pt-2 text-white">{{ $track_title }}</p></strong>
                    <input type="hidden" id="trackTitle" name="track_title" value="{{ $track_title }}">
                    <p class="ml-4 pb-2 text-sm text-white">{{ $artist }} </p>
                    <input type="hidden" id="artist" name="artist" value="{{ $artist }}">
                    <div class="flex justify-center">
                        <iframe src="<?php echo 'https://embed.spotify.com/?uri=' . $track_uri; ?>" width="250" height="80" frameborder="0" allowtransparency="true"></iframe>
                        <input type="hidden" id="trackUri" name="track_uri" value="{{ $track_uri }}">
                    </div>
                    <div class="flex flex-col items-center justify-center py-4">
                        <button type="submit" class="text-sm mx-2 rounded-md bg-black px-2 py-2 text-white hover:bg-yellow-300 hover:text-black">Add</button>
                    </div> 
                </form>              
            </div>
        </div>

    @endauth

@endsection