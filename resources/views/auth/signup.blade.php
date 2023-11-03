@extends('layouts.main')

@section('title', 'signup')

@section('content')
    <!-- component -->
    <form action="/auth/register" method="post">
        @csrf
        <div class="bg-grey-lighter min-h-screen flex flex-col">
            <div class="container max-w-sm mx-auto flex-1 flex flex-col items-center justify-center px-2">
                <div class="bg-white px-6 py-8 rounded shadow-md text-black w-full">
                    <h1 class="mb-8 text-3xl text-center">Sign up</h1>
                    <div>
                        <input type="text" value="{{ old('first_name') }}" class="block border border-grey-light w-full p-3 rounded mt-4 " name="first_name"
                            placeholder="First Name" />
                        @error('first_name')
                            <p class="text-sm text-red-500 font-bold">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <input type="text" class="block border border-grey-light w-full p-3 rounded mt-4"
                            name="last_name" placeholder="Last Name"
                            value="{{ old('last_name') }}" />

                        @error('last_name')
                            <p class="text-sm text-red-500 font-bold">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <input type="text" class="block border border-grey-light w-full p-3 rounded  mt-4" name="email"
                            placeholder="Email" 
                            value="{{ old('email') }}"/>
                        @error('email')
                            <p class="text-sm text-red-500 font-bold">{{ $message }}</p>
                        @enderror

                    </div>
                    <div>
                        <input type="password" class="block border border-grey-light w-full p-3 rounded  mt-4"
                            name="password" placeholder="Password" 
                            value="{{ old('password') }}"/>
                        @error('password')
                            <p class="text-sm text-red-500 font-bold">{{ $message }}</p>
                        @enderror

                    </div>
                    <div>
                        <input type="password" class="block border border-grey-light w-full p-3 rounded  mt-4 "
                            name="password_confirmation" placeholder="Confirm Password" />
                        @error('password_confirmation')
                            <p class="text-sm text-red-500 font-bold">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit"
                        class="w-full text-center py-3 rounded bg-green-500 text-white hover:bg-green-dark focus:outline-none my-1">Create
                        Account</button>

                    {{-- <div class="text-center text-sm text-grey-dark mt-4">
                By signing up, you agree to the 
                <a class="no-underline border-b border-grey-dark text-grey-dark" href="#">
                    Terms of Service
                </a> and 
                <a class="no-underline border-b border-grey-dark text-grey-dark" href="#">
                    Privacy Policy
                </a>
            </div> --}}
                </div>

                <div class="text-grey-dark mt-6">
                    Already have an account?
                    <a class="no-underline border-b border-blue text-blue" href="/auth/login">
                        Log in
                    </a>.
                </div>
            </div>
        </div>
    </form>
@endsection
