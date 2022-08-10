@extends('components/layout')

@section('main')

    @auth
    
        <h1 class="mt-8 ml-16 text-3xl">{{ auth()->user()->username }}'s playlist</h1>
        
    @endauth

@endsection