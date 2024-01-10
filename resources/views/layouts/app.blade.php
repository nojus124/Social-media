<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased font-poppins min-h-screen">
        <x-banner />
        <div class="flex bg-white relative border-customGray border-r-2">
            <div class="sticky top-0 h-fit items-center w-3/12 flex flex-col">
                <div class="w-9/12 border-b-2 pb-7 border-b-customGray">
                    <div class="my-12 px-5">
                        <a href="{{route('dashboard')}}">
                            <img class="w-44 h-10" src="{{asset('assets/Logo-Universe.png')}}">
                        </a>
                    </div>
                    <div class="flex px-5 py-3 rounded-lg {{ request()->routeIs('dashboard') ? 'bg-customGray' : ''}} cursor-pointer">
                        <x-icon class="h-5 w-5 mr-1 {{ request()->routeIs('dashboard') ? 'text-customRed' : 'text-customBlack'}}" name="home" outline />
                        <a href="{{ route('dashboard') }}">
                            <div class="{{ request()->routeIs('dashboard') ? 'text-customRed font-semibold' : 'text-customBlack'}}">Home</div>
                        </a>
                    </div>
                    <div class="flex mt-4 px-5 py-3 rounded-lg active:bg-customGray cursor-pointer">
                        <x-icon class="h-5 w-5 mr-1 text-customBlack" name="user-circle" outline />
                        <a href="#">
                            <div class="font-normal text-customBlack">Profile</div>
                        </a>
                    </div>
                    <div class="flex mt-4 px-5 py-3 rounded-lg {{ request()->routeIs('communities.community') ? 'bg-customGray' : ''}} cursor-pointer">
                        <x-icon class="h-5 w-5 mr-1 {{ request()->routeIs('communities.community') ? 'text-customRed' : 'text-customBlack'}}" name="globe-alt" outline />
                        <a href="{{route('communities.community')}}">
                        <div class="{{ request()->routeIs('communities.community') ? 'text-customRed font-semibold' : 'text-customBlack'}}">Explore Communities</div>
                        </a>
                    </div>
                    <div class="flex mt-4 px-5 py-3 rounded-lg {{ request()->routeIs('profile.show') ? 'bg-customGray' : ''}} cursor-pointer">
                        <x-icon class="h-5 w-5 mr-1 {{ request()->routeIs('profile.show') ? 'text-customRed' : 'text-customBlack'}}" name="cog-6-tooth" outline />
                        <a href="{{ route('profile.show') }}">
                        <div class="{{ request()->routeIs('profile.show') ? 'text-customRed font-semibold' : 'text-customBlack'}}">Settings</div>
                        </a>
                    </div>
                </div>
                @livewire('show-communities')
            </div>
            <div class="w-9/12 min-h-full">
                <div class="min-h-full bg-gray-100 dark:bg-gray-900">
                    @livewire('navigation-menu')
                    <!-- Page Content -->
                    <main>
                        {{ $slot }}
                    </main>
                </div>
            </div>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
