@extends('components/layout')

@section('main')

    @auth

        @if(! $message)
            {{ $article }}
        @else
            {{ $message }}
        @endif

    @endauth

@endsection