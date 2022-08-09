@extends('components/layout')

@section('main')
    <h1 class="mt-8 ml-16 text-4xl font-medium">Create account</h1>

    <div class="mx-auto my-10 w-full max-w-lg">
        <div class="flex min-h-full items-center justify-start bg-white">

            <form class="mt-0" method="POST" action="{{ route('registerSubmit') }}">
            <!-- Cross-Site Request Forgery Protection -->
                @csrf
            <!-- Flash message to show successful account creation -->
                @if (Session::has('success'))
                    <div class="text-green-500 py-4">
                        <p>{{ Session::get('success') }}</p>
                    </div>
                @endif
                @if (Session::has('error'))
                    <p class="text-red-500 py-4">{{ Session::get('error') }}</p>
                @endif
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="grid gap-6 sm:grid-cols-2">
                    <div class="relative z-0 col-span-2">
                        <input type="text" value="{{ old('username') }}" name="username" class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0" placeholder=" " />
                        <label class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">Your username</label>
                        @if ($errors->has('username'))
                            <span class="text-red-500 text-xs">{{$errors->first('username') }}</span>
                        @endif
                    </div>
                    <div class="relative z-0 col-span-2">
                        <input type="text" value="{{ old('email') }}" name="email" class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0" placeholder=" " />
                        <label class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">Your email</label>
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
                    <div class="relative z-0 col-span-2">
                        <input id="terms-checkbox" name="terms" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="terms-checkbox" class="ml-2 text-xs text-gray-900 dark:text-gray-300">I'm at least 16 years old and accept the Terms of Use.</label>
                        <!-- <button class="modal-open text-xs text-gray-500 hover:text-green-600 underline">Terms of Use</button> -->
                        @if ($errors->has('terms'))
                            <p class="text-red-500 text-xs">{{$errors->first('terms') }}</p>
                        @endif
                    </div>
                    <div class="relative z-0 col-span-2">
                        <input id="privacy-checkbox" name="policy" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="privacy-checkbox" class="ml-2 text-xs text-gray-900 dark:text-gray-300">I accept the privacy policy and consent to the processing of my personal information.</label>
                        @if ($errors->has('policy'))
                            <p class="text-red-500 text-xs">{{$errors->first('policy') }}</p>
                        @endif
                    </div>
                </div>
                <button type="submit" class="mt-5 rounded-md bg-black px-10 py-2 text-white">Sign up</button>
            </form>
        </div>
    </div>

@endsection