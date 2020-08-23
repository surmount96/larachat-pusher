@extends('layouts.master')

@section('content')
    <div class="flex flex-wrap" style="height: 100vh">
        <div class="lg:w-1/2 md:w-1/2 sm:w-1/2 lg:flex md:flex hidden w-full p-12">
            <img src="{{ asset('img/arrived.svg') }}" alt="">
        </div>
        <div class="lg:w-1/2 md:w-1/2 sm:w-1/2 w-full bg-blue-deep">
            <div class=" ml-auto">
                <div class="lg:w-6/12 md:w-6/12 sm:w-5/12 py-3 ml-auto flex">
                    <a href="/login" class="rounded-l-full bg-yellow text-white py-2 px-8">sign in</a>
                    <a href="/register" class="rounded-r-full bg-blue-light text-gray-500 py-2 px-8">sign up</a>
                </div>
            </div>
            <div class="lg:px-20 md:px-12 px-4 py-10">
                <h3 class="text-white text-h4 mt-2">Welcome back,</h3>
                <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                    @csrf
                    <div class="mt-16 ">
                        <label for="" class="text-gray-400 text-body-2">EMAIL</label>
                        <input type="email" class="text-medium placeholder-gray-500 text-gray-500  focus:outline-none focus:bg-transparent border-b border-gray bg-transparent pb-4 w-full mt-3 {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Enter your email" required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback text-red" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group mt-12">
                        <label for="" class="text-gray-400 text-body-2">PASSWORD</label>
                        <input type="password" class="text-medium placeholder-gray-500 text-gray-500 focus:outline-none focus:bg-transparent border-b border-gray bg-transparent pb-4 w-full mt-3 {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="**********" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback text-red" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <button type="submit" class="text-body-2 bg-yellow rounded-full text-white w-40 py-3 my-4">Sign in</button>
                    <div class="row">
                        <div class="col-12 text-right">
                            <a class="text-sky-blue text-body-2 " href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


