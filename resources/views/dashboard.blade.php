@extends('components/layout')

@section('main')

    @auth

        <h1 class="mt-8 ml-16 text-3xl">Welcome, {{ auth()->user()->username }}!</h1>
    
        <!-- <form class="mt-0" method="POST" action="{{ route('api') }}">
            @csrf
            <button type="submit" class="mt-5 ml-16 rounded-md bg-black px-10 py-2 text-white">Click here</button>
        </form> -->

        <div class="mx-auto my-10 w-full max-w-lg">
            <div class="flex min-h-full items-center justify-start bg-white">
                <form class="mt-0 w-full" method="POST" action="{{ route('api') }}">
                    @csrf
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="grid gap-6 sm:grid-cols-2">
                        <div class="relative col-span-2">
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </div>
                            <input type="search" id="default-search" class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for podcast episode..." required>
                            <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-black hover:bg-yellow-300 hover:text-black focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="flex justify-center">
            <p>We think you should add this episode to your playlist</p>
        </div>
    
    @endauth

    <!-- @if(Session::has('success'))
        <div class="ml-16 text-green-500 py-4">
            {{ Session::get('success') }}
        </div>
    @endif -->

@endsection