@extends('components/layout')

@section('main')

    @auth

        <div class="w-screen inline-block">
            <div class="float-left mt-10 mb-4 ml-16">
                <h1 class="text-3xl">Summary</h1>
            </div>
            <div class="float-right mt-12 mb-4 mr-16">
                <a class="rounded-md bg-black px-4 py-2 text-white hover:bg-yellow-300 hover:text-black" href="{{ route('playlist') }}">Back to overview</a>
            </div>
        </div>

        <div class="flex flex-wrap ml-16 mr-16 mb-8 justify-center">
            <div class="w-72 m-2 mb-8 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                <div class="object-center mt-4">
                    <img class="rounded-lg w-40 mx-auto" src="{{ $image_url }}" alt="Podcast image">
                </div>    
                <strong><p class="ml-4 pt-2"> {{ $track }}</p></strong>
                <p class="ml-4 pb-2 text-sm">By {{ $artist }} </p>
                <div class="flex justify-center">
                    <iframe src="<?php echo 'https://embed.spotify.com/?uri=' . $track_uri; ?>" width="250" height="80" frameborder="0" allowtransparency="true"></iframe>
                </div>
                <div>
                    <strong><p class="ml-4 mt-2 pb-2 text-bold">My notes</p></strong>
                    <?php if($notes == null) : ?>
                        <p class="ml-4 pb-2">-</p>
                    <?php else : ?>
                        <p class="ml-4 pb-2"><?=$notes?></p>
                    <?php endif; ?>
                </div>
                
            </div>
        </div>

    @endauth

@endsection