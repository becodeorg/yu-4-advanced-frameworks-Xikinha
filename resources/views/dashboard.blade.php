@extends('components/layout')

@section('main')
    <h1 class="mt-8 ml-16 text-4xl font-medium">Dashboard</h1>

    @auth
        <p class="mt-8 ml-16">Welcome, {{ auth()->user()->username }}!</p>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="ml-16 text-red-500 py-4" type="submit">Logout</button>
        </form>

        <form class="mt-0" method="POST" action="{{ route('api') }}">
            @csrf
            <button type="submit" class="mt-5 ml-16 rounded-md bg-black px-10 py-2 text-white">Click here</button>
        </form>

    @else
        <p class="mt-8 ml-16 mr-16">Please login or create an account to view restricted data.</p>
        <div class="ml-16 py-4">
            <a class="ml-4 text-red-500" href="{{ route('login') }}">Login</a>
        </div>
    @endauth

    @if(Session::has('success'))
        <div class="ml-16 text-green-500 py-4">
            {{ Session::get('success') }}
        </div>
    @endif

@endsection