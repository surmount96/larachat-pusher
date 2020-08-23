@extends('layouts.master')

@section('content')
    <div class="flex flex-wrap" style="height: 100vh">
        <div class="lg:w-1/2 md:w-1/2 lg:flex md:flex hidden sm:w-1/2 w-full p-12">
            <img src="{{ asset('img/arrived.svg') }}" alt="">
        </div>
        <div class="lg:w-1/2 md:w-1/2 w-full bg-blue-deep">
            <div class="ml-auto">
                <div class="lg:w-6/12 md:w-6/12 sm:w-5/12 py-3 ml-auto flex">
                    <a href="/login"  class="rounded-l-full bg-blue-light text-gray-500  py-2 px-8">sign in</a>
                    <a href="/register"  class="rounded-r-full bg-yellow text-white py-2 px-8">sign up</a>
                </div>
            </div>
            <div class="lg:px-20 md:px-12 px-4 py-3">
                <h3 class="text-white text-h4 mt-2">Sign up,</h3>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mt-8 ">
                        <label for="" class="text-gray-400 text-body-2">FULLNAME</label>
                        <input type="name" class="text-medium placeholder-gray-500 text-gray-500  focus:outline-none focus:bg-transparent border-b border-gray bg-transparent pb-4 w-full mt-3 @error('name') is-invalid @enderror" name="name" placeholder="Enter your full name" required>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mt-6 ">
                        <label for="" class="text-gray-400 text-body-2">EMAIL</label>
                        <input type="email" class="text-medium placeholder-gray-500 text-gray-500  focus:outline-none focus:bg-transparent border-b border-gray bg-transparent pb-4 w-full mt-3 @error('email') is-invalid @enderror" name="email" placeholder="Enter your email" required>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mt-6">
                        <label for="" class="text-gray-400 text-body-2">PASSWORD</label>
                        <input type="password" class="text-medium placeholder-gray-500 text-gray-500 focus:outline-none focus:bg-transparent border-b border-gray bg-transparent pb-4 w-full mt-3 @error('password') is-invalid @enderror" name="password" placeholder="**********" required>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mt-6">
                        <label for="password-confirm" class="text-gray-400 text-body-2">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="text-medium placeholder-gray-500 text-gray-500 focus:outline-none focus:bg-transparent border-b border-gray bg-transparent pb-4 w-full mt-3 @error('password') is-invalid @enderror" placeholder="**********" name="password_confirmation" required autocomplete="new-password">
                    </div>
                    <div class="flex justify-between items-center">
                        <button type="submit" class="shadow text-body-2 bg-yellow rounded-full text-white w-40 py-3 my-4">{{ __('Register') }}</button>
                        <div class="col-12 text-right">
                            <a class="text-gray-500 text-body-2 " href="{{ route('login') }}">
                                {{ __('Already a member') }}
                            </a>
                        </div>
                    </div>
                    <div class="row">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

