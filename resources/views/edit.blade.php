@extends('components/layout')

@section('main')

    @auth

        <div class="w-screen inline-block">
            <div class="float-left mt-10 mb-4 ml-16">
                <h1 class="text-3xl">Take notes</h1>
            </div>
            <div class="float-right mt-12 mb-4 mr-16">
                <a class="rounded-md bg-black px-4 py-2 text-white hover:bg-yellow-300 hover:text-black" href="{{ route('playlist') }}">Back to overview</a>
            </div>
        </div>

        <form class="mt-0 w-full" method="POST" action="{{ route('storeNotes') }}">
            @csrf
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="w-1/2 mx-auto">
                <label for="track" class="block mt-2 text-sm font-medium text-gray-900 dark:text-gray-400">Track</label>
                <input type="text" id="track" name="track" class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0" value="{{ $track }}" />
                <label for="artist" class="block mt-2 text-sm font-medium text-gray-900 dark:text-gray-400">Artist</label>
                <input type="text" id="artist" name="artist" class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-black focus:border-blue-600 focus:outline-none focus:ring-0" value="{{ $artist }}" />
                <label for="notes" class="block mt-2 mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">My notes</label>
                <textarea id="notes" name="notes" rows="5" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="...">{{ $notes }}</textarea>
            </div>
            <div class="flex flex-col items-center justify-center py-4">
                <button type="submit" class="mt-5 rounded-md bg-black px-4 py-2 text-white hover:bg-yellow-300 hover:text-black">Update</button>
            </div>
        </form>
 

    @endauth

@endsection