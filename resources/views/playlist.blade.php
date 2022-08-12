@extends('components/layout')

@section('main')

    @auth

        <h1 class="mt-10 mb-4 ml-16 text-3xl">{{ auth()->user()->username }}'s playlist</h1>

        @if($empty)

            <p class="ml-16 mr-16 py-4">You have no episodes in your playlist. <span><a class="underline hover:text-gray-900" href="{{ route('dashboard') }}">Click here</a> to discover new podcasts.</span></p>

        @else

            <div class="flex flex-wrap ml-16 mr-16 mb-8 justify-center">
                @foreach ($podcasts as $podcast)
                    <div class="h-96 w-72 m-2 mb-8 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                        <div class="object-center mt-4">
                            <img class="rounded-lg w-40 mx-auto" src="{{ $podcast->image_url }}" alt="Podcast image">
                        </div>    
                        <strong><p class="ml-4 pt-2"> {{ $podcast->track }}</p></strong>
                        <p class="ml-4 pb-2 text-sm">By {{ $podcast->artist }} </p>
                        <div class="flex justify-center">
                            <iframe src="<?php echo 'https://embed.spotify.com/?uri=' . $podcast->track_uri; ?>" width="250" height="80" frameborder="0" allowtransparency="true"></iframe>
                        </div>
                        <div class="flex flex-col items-center justify-center py-4">
                            <form method="POST" action="{{ route('delete', $podcast->id) }}">
                                <a class="rounded-md bg-black mx-2 px-2 py-2 text-white" href="{{ route('show', $podcast->id) }}">Show</a>
                                <a class="rounded-md bg-black mx-2 px-2 py-2 text-white" href="#">Add notes</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-sm mx-2 rounded-md bg-gray-400 px-2 py-2 text-white hover:bg-yellow-300 hover:text-black">Delete</button>
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