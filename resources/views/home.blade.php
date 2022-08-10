@extends('components/layout')

@section('main')

    <h1 class="mt-12 ml-16 text-3xl">Curate your podcast playlist</h1>

    <div class="flex mt-8 ml-16 mr-16">
        <div class="flex-none w-1/2">
            <p class="mt-10">Discover interesting episodes based on your preferences and add to your playlist. We provide you with daily suggestions.</p>
            <p class="mt-4">PODCASTnote combines a podcast player with an online notebook. Create snippets of favourite episodes, or take notes of important insights.</p>
            <p class="mt-4">Keep your info with you everywhere you go, and search for it with ease at any time.</p>
            <div class="flex items-center justify-center mt-5 py-4">
                @auth
                    <a class="rounded-md bg-black px-10 py-2 text-white hover:bg-yellow-300 hover:text-black" href="{{ route('logout') }}">Logout</a>
                @else
                    <a class="rounded-md bg-black px-10 py-2 text-white hover:bg-yellow-300 hover:text-black" href="{{ route('login') }}">Login to continue</a>
                @endauth
            </div>
        </div>
        <div class="flex-none w-1/2">
            <img class="flex w-3/4 ml-20" src="/images/podcastnote.png" alt="Podcastnote explanation">
        </div>
    </div>

@endsection