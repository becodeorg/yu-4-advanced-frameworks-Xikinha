@extends('components/layout')

@section('main')

    @auth

        <h1 class="mt-12 ml-16 text-3xl">{{ auth()->user()->username }}'s playlist</h1>
        

    @endauth

@endsection

        <!-- <p class="ml-16 mr-16 py-4">You have {{ $amount }} episodes in your playlist.</p> -->

        <!-- @foreach ($books as $book)
            <strong><p class="ml-24 mr-24 pt-4"> {{ $book->title }}</p></strong>
            <p class="ml-24 mr-24 pb-4">By {{ $book->first_name }} {{ $book->last_name }}, First published: {{ $book->publication_date }} ({{ $book->publisher }})</p>
        @endforeach -->


        <a class="text-sm rounded-md bg-black m-4 px-4 py-2 text-white hover:bg-yellow-300 hover:text-black" href="#">Add notes</a>
        <a class="text-sm rounded-md bg-black m-4 px-4 py-2 text-white hover:bg-yellow-300 hover:text-black" href="{{ route('delete') }}">Delete</a>




                                    <a class="ml-24 mr-24 rounded-md bg-black px-10 py-2 text-white" href="{{route('delete')}}">Add</a>
                                    <a class="ml-24 mr-24 rounded-md bg-black px-10 py-2 text-white" href="{{route('delete')}}">Delete</a>