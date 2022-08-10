@extends('components/layout')

@section('main')

    <div class="flex justify-center">
        <h1 class="mt-12 text-3xl">Login</h1>
    </div>

    <div class="mx-auto my-10 w-full max-w-lg">
        <div class="flex min-h-full items-center justify-start bg-white">

        <form class="mt-0 w-full" method="POST" action="{{ route('loginSubmit') }}">
            @csrf
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="grid gap-6 sm:grid-cols-2">
                    <div class="relative z-0 col-span-2">
                        <input type="text" name="email" class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0" placeholder=" " />
                        <label class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">Your username or email</label>
                        @if ($errors->has('email'))
                            <span class="text-red-500 text-xs">{{$errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="relative z-0 col-span-2">
                        <input type="password" name="password" class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0" placeholder=" " />
                        <label class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">Your password</label>
                        @if ($errors->has('password'))
                            <span class="text-red-500 text-xs">{{$errors->first('password') }}</span>
                        @endif
                    </div>
                </div>
                <div class="flex flex-col items-center justify-center py-4">
                    <button type="submit" class="mt-5 rounded-md bg-black px-10 py-2 text-white hover:bg-yellow-300 hover:text-black">Login</button>
                    <p class="mt-2 content-center text-xs"><strong>Not registered yet?<span><a class="content-center text-xs text-green-600 hover:text-gray-900" href="{{ route('register') }}"> Create your account here.</a></span></strong></p>
                </div>
            </form>
        </div>
    </div>

@endsection