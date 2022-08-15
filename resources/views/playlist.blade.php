@extends('components/layout')

@section('main')

    @auth

        <h1 class="mt-10 mb-4 ml-16 text-3xl">{{ auth()->user()->username }}'s playlist</h1>

        @if($empty)

            <p class="ml-16 mr-16 py-4">You have no episodes in your playlist. <span><a class="underline hover:text-gray-900" href="{{ route('dashboard') }}">Click here</a> to discover new podcasts.</span></p>

        @else

            <div class="flex flex-wrap ml-16 mr-16 mb-8 justify-center">
                @foreach ($podcasts as $podcast)
                    <div class="h-96 w-72 m-2 mb-8 bg-gradient-to-b from-black via-black rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                        <div class="object-center mt-4">
                            <img class="rounded-lg w-40 mx-auto" src="{{ $podcast->image_url }}" alt="Podcast image">
                        </div>    
                        <strong><p class="ml-4 pt-2 text-white"> {{ $podcast->track }}</p></strong>
                        <p class="ml-4 pb-2 text-sm text-white">{{ $podcast->artist }} </p>
                        <div class="flex justify-center">
                            <iframe src="<?php echo 'https://embed.spotify.com/?uri=' . $podcast->track_uri; ?>" width="250" height="80" frameborder="0" allowtransparency="true"></iframe>
                        </div>
                        <div class="flex flex-col items-center justify-center py-4">
                            <form method="POST" action="{{ route('delete', $podcast->id) }}">
                                @csrf
                                <a class="rounded-md text-sm font-semibold bg-black mx-2 px-2 py-2 text-white hover:bg-yellow-300 hover:text-black" href="{{ route('show', $podcast->id) }}">Show</a>
                                <a class="rounded-md text-sm font-semibold bg-black mx-2 px-2 py-2 text-white hover:bg-yellow-300 hover:text-black" href="{{ route('edit', $podcast->id) }}">Add notes</a>
                                <a class="rounded-md text-sm font-semibold bg-black mx-2 px-2 py-2 text-white hover:bg-yellow-300 hover:text-black" href="{{ route('delete', $podcast->id) }}">Delete</a>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

        @endif

    @else

        <h1 class="mt-10 mb-4 ml-16 text-3xl">Welcome</h1>

        <p class="ml-16 mr-16 py-4">You have to login to access your playlist. <span><a class="underline text-green-600 hover:text-gray-900" href="{{ route('login') }}">Click here</a> to login.</span></p>

    @endauth

@endsection