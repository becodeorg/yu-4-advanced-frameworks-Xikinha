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


        

            <form class="mt-0 w-full" method="POST" action="{{ route('search') }}">
            @csrf
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="grid gap-6 sm:grid-cols-2">
                    <div class="relative z-0 col-span-2">
                        <input type="text" name="query" class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0" placeholder=" " />
                        <label class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">Search track...</label>
                    </div>
                </div>
                <div class="flex flex-col items-center justify-center py-4">
                    <button type="submit" class="mt-5 rounded-md bg-black px-4 py-2 text-white hover:bg-yellow-300 hover:text-black">Search</button>
                </div>
            </form>