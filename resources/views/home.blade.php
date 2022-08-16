@extends('components/layout')

@section('main')

    <h1 class="mt-10 ml-16 text-3xl">Curate your podcast playlist</h1>

    <div class="flex mt-8 ml-16 mr-16">
        <div class="flex-none w-1/2">
            <p class="mt-10">Discover interesting episodes based on your preferences and add to your playlist. We provide you with additional daily suggestions.</p>
            <p class="mt-4">PODCASTnote combines a podcast player with an online notebook. Create snippets of favourite episodes, or take notes of important insights.</p>
            <p class="mt-4">Keep your info with you everywhere you go, and search for it with ease at any time.</p>
            <div class="flex items-center justify-center mt-6 py-4">
                @auth
                    <a class="rounded-md bg-black px-4 py-2 text-sm font-semibold text-white hover:bg-yellow-400 hover:text-black" href="{{ route('logout') }}">Logout</a>
                @else
                    <div class="flex flex-col items-center justify-center">
                        <a class="rounded-md bg-black px-4 py-2 text-sm font-semibold text-white hover:bg-yellow-400 hover:text-black" href="{{ route('login') }}">Login to continue</a>
                        <p class="mt-4 content-center text-xs"><strong>Not registered yet?<span><a class="content-center text-xs text-green-600 hover:text-gray-900" href="{{ route('register') }}"> Create your account here.</a></span></strong></p>
                    </div>
                @endauth
            </div>
        </div>
        <div class="flex w-1/2">
            <img class="mx-auto hidden lg:block flex w-3/4 h-3/4" src="/images/podcastnote.png" alt="Podcastnote explanation">
            <img class="mx-auto mt-20 block lg:hidden flex h-1/3" src="/images/podcastnote.png" alt="Podcastnote explanation">
        </div>
    </div>

@endsection