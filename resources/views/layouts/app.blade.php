<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Kilenra') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <main class="">
            <div class="flex flex-wrap relative">
                <div class="fixed z-50 lg:inline-block md:inline-block hidden" style="width:350px">
                    <div class="bg-white text-dark mr-16 flex flex-col justify-between shadow" style="height: 100vh">
                        <div class="flex flex-col ">
                            <ul class="mb-6">
                                <li class=" mt-5">
                                    <div class="w-6/12 mx-auto ">
                                        <a href="/dashboard" class="font-bold text-blue-base">
                                            ChatApp
                                        </a>
                                    </div>
                                </li>
                            </ul>
                            <ul class="pt-5 text-medium">
                                <li class="w-6/12 mx-auto">
                                    <a href="/dashboard"  class="flex items-center py-5">
                                        <div class="">
                                            <svg class="text-dark w-5" viewBox="0 0 20 20" fill="currentColor" class="view-grid w-6 h-6"><path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                                        </div>
                                        <div class="ml-2">Dashboard</div>
                                    </a>

                                </li>

                                <li class=" w-6/12 mx-auto">
                                    <a class="py-5 flex items-center" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout').submit()">
                                        <div class="">
                                            <img src="{{ asset('img/icons/power.svg') }}" alt="power" class="w-5" >
                                        </div>
                                        <div class="ml-2">

                                            Logout
                                        </div>
                                    </a>
                                    <form action="{{route('logout')}}" method="post" id="logout" style="display: none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="lg:w-9/12 md:w-9/12 w-full lg:absolute md:absolute right-0 lg:mx-0 md:mx-0 mx-4 lg:mr-6 md:mr-6 pb-6" style="margin-l: -1.7rem">
                    <div class="">
                        @include('dashboard.navbar')
                    </div>
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
</body>
</html>
