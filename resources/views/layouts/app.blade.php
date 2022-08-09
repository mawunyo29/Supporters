<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="slide">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    

    <title>{{ config('app.name', Route::currentRouteName()) }}</title>
    @yield('title')

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
    <link rel="stylesheet" href="{{mix('css/build.css')}}">
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
    <!-- Styles -->

    @livewireStyles

    <!-- Scripts -->

</head>

<body class="font-sans antialiased" id="content">
    <x-jet-banner />
    <div class="min-h-screen bg-gray-100 dark:bg-indigo-700 dark:text-white" id="app_content">
        {{-- ondrop="drop_handler(event)" ondragover="dragover_handler(event)" --}}
        @livewire('navigation-menu')
        <!-- Page Heading -->
        @if (isset($header))
        <header class="bg-white shadow dark:bg-blue-800">
            <div class="px-4 py-1 mx-auto max-w-7xl sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endif
        <!-- Page Content -->
        <div x-data="{ open: false,showNotifications:false }" @keydown.window.escape="open = false"
            @keydown.window.escape="showNotifications = false">
            <div x-show="open" class="fixed inset-0 z-40 flex md:hidden"
                x-description="Off-canvas menu for mobile, show/hide based on off-canvas menu state." x-ref="dialog"
                aria-modal="true" style="display: none">
                <div x-show="open" x-transition:enter="transition-opacity ease-linear duration-300"
                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                    x-transition:leave="transition-opacity ease-linear duration-300"
                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                    x-description="Off-canvas menu overlay, show/hide based on off-canvas menu state."
                    class="fixed inset-0 bg-gray-600 bg-opacity-75" @click="open = false" aria-hidden="true"
                    style="display: none"></div>

                <div x-show="open" x-transition:enter="transition ease-in-out duration-300 transform"
                    x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
                    x-transition:leave="transition ease-in-out duration-300 transform"
                    x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full"
                    x-description="Off-canvas menu, show/hide based on off-canvas menu state."
                    class="relative flex flex-col flex-1 w-full max-w-xs bg-gray-800" style="display: none">
                    <div x-show="open" x-transition:enter="ease-in-out duration-300"
                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                        x-transition:leave="ease-in-out duration-300" x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        x-description="Close button, show/hide based on off-canvas menu state."
                        class="absolute top-0 right-0 pt-2 -mr-12" style="display: none">
                        <button type="button"
                            class="flex items-center justify-center w-10 h-10 ml-1 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                            @click="open = false">
                            <span class="sr-only">Close sidebar</span>
                            <svg class="w-6 h-6 text-white" x-description="Heroicon name: outline/x"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>

                    <div class="flex-1 h-0 pt-5 pb-4 overflow-y-auto">
                        <div class="flex items-center flex-shrink-0 px-4">
                            <a href="{{ route('dashboard') }}">
                                <x-jet-application-mark class="block w-auto h-9 " />
                            </a>
                        </div>
                        {{-- mobile-menu-content --}}
                        <nav class="px-2 mt-5 space-y-1 ">
                            <a href="#"
                                class="flex items-center px-2 py-2 text-base font-medium text-white bg-gray-900 rounded-md group"
                                x-state:on="Current" x-state:off="Default"
                                x-state-description='Current: "bg-gray-900 text-white", Default: "text-gray-800 dark:text-white hover:bg-gray-700 hover:text-white"'>
                                <svg class="flex-shrink-0 w-6 h-6 mr-4 text-gray-800 dark:text-white"
                                    x-state:on="Current" x-state:off="Default"
                                    x-state-description='Current: "text-gray-800 dark:text-white", Default: "text-gray-400 group-hover:text-gray-100 dark:text-white"'
                                    x-description="Heroicon name: outline/home" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                    </path>
                                </svg>
                                Dashboard
                            </a>
                            <a href="#"
                                class="flex items-center px-2 py-2 text-base font-medium text-gray-800 rounded-md dark:text-white hover:bg-gray-700 hover:text-white group"
                                x-state-description='undefined: "bg-gray-900 text-white", undefined: "text-gray-800 dark:text-white hover:bg-gray-700 hover:text-white"'>
                                <svg class="flex-shrink-0 w-6 h-6 mr-4 text-gray-400 group-hover:text-gray-100 dark:text-white"
                                    x-state-description='undefined: "text-gray-800 dark:text-white", undefined: "text-gray-400 group-hover:text-gray-100 dark:text-white"'
                                    x-description="Heroicon name: outline/users" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                    </path>
                                </svg>
                                Amis
                            </a>
                            <a href="#"
                                class="flex items-center px-2 py-2 text-base font-medium text-gray-800 rounded-md dark:text-white hover:bg-gray-700 hover:text-white group"
                                x-state-description='undefined: "bg-gray-900 text-white", undefined: "text-gray-800 dark:text-white hover:bg-gray-700 hover:text-white"'>
                                <svg class="flex-shrink-0 w-6 h-6 mr-4 text-gray-400 group-hover:text-gray-100 dark:text-white"
                                    x-state-description='undefined: "text-gray-800 dark:text-white", undefined: "text-gray-400 group-hover:text-gray-100 dark:text-white"'
                                    x-description="Heroicon name: outline/folder" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z">
                                    </path>
                                </svg>
                                Ajouter
                            </a>
                            <a href="#"
                                class="flex items-center px-2 py-2 text-base font-medium text-gray-800 rounded-md dark:text-white hover:bg-gray-700 hover:text-white group"
                                x-state-description='undefined: "bg-gray-900 text-white", undefined: "text-gray-800 dark:text-white hover:bg-gray-700 hover:text-white"'>
                                <svg class="flex-shrink-0 w-6 h-6 mr-4 text-gray-400 group-hover:text-gray-100 dark:text-white"
                                    x-state-description='undefined: "text-gray-800 dark:text-white", undefined: "text-gray-400 group-hover:text-gray-100 dark:text-white"'
                                    x-description="Heroicon name: outline/calendar" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                En attente
                            </a>
                            <a href="#"
                                class="flex items-center px-2 py-2 text-base font-medium text-gray-800 rounded-md dark:text-white hover:bg-gray-700 hover:text-white group"
                                x-state-description='undefined: "bg-gray-900 text-white", undefined: "text-gray-800 dark:text-white hover:bg-gray-700 hover:text-white"'>
                                <svg class="flex-shrink-0 w-6 h-6 mr-4 text-gray-400 group-hover:text-gray-100 dark:text-white"
                                    x-state-description='undefined: "text-gray-800 dark:text-white", undefined: "text-gray-400 group-hover:text-gray-100 dark:text-white"'
                                    x-description="Heroicon name: outline/inbox" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                                    </path>
                                </svg>
                                Blog
                            </a>
                            <a href="#"
                                class="flex items-center px-2 py-2 text-base font-medium text-gray-800 rounded-md dark:text-white hover:bg-gray-700 hover:text-white group"
                                x-state-description='undefined: "bg-gray-900 text-white", undefined: "text-gray-800 dark:text-white hover:bg-gray-700 hover:text-white"'>
                                <svg class="flex-shrink-0 w-6 h-6 mr-4 text-gray-400 group-hover:text-gray-100 dark:text-white"
                                    x-state-description='undefined: "text-gray-800 dark:text-white", undefined: "text-gray-400 group-hover:text-gray-100 dark:text-white"'
                                    x-description="Heroicon name: outline/chart-bar" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                    </path>
                                </svg>
                                En attente
                            </a>
                        </nav>
                    </div>
                    {{-- footer --}}
                    <div class="flex flex-shrink-0 p-4 bg-gray-700">
                        <a href="#" class="flex-shrink-0 block group">
                            <div class="flex items-center">
                                <div>
                                    <img class="inline-block w-10 h-10 rounded-full"
                                        src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80"
                                        alt="" />
                                </div>
                                <div class="ml-3">
                                    <p class="text-base font-medium text-white">Tom Cook</p>
                                    <p
                                        class="text-sm font-medium text-gray-400 group-hover:text-gray-100 dark:text-white">
                                        View profile
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    {{-- and mobile content. --}}
                </div>

                <div class="flex-shrink-0 w-14">
                    <!-- Force sidebar to shrink to fit close icon -->
                </div>
            </div>
            <!-- Static sidebar for desktop -->
            <div class="hidden md:flex md:flex-row md:fixed md:inset-y-0" id="sidebar">
                <!-- Sidebar component, swap this element with another sidebar if you like -->
                <x-navigations.slide-navigation :user="$user"></x-navigations.slide-navigation>
                @livewire('back.notification-controller', ['user' => $user], key($user->id))
               
            </div>
            <div class="flex flex-col flex-1 md:px-14 ">
                <div class="sticky top-0 z-10 pt-1 pl-1 bg-gray-100 md:hidden sm:pl-3 sm:pt-3">
                    <button type="button"
                        class="-ml-0.5 -mt-0.5 h-12 w-12 inline-flex items-center justify-center rounded-md text-gray-500 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                        @click="open = true">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" x-description="Heroicon name: outline/menu"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
                <main class="flex-1 retlative">
                    <div class="py-6">
                        {{-- <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                            <h1 class="text-2xl font-semibold text-gray-900">
                                Dashboard
                            </h1>
                        </div> --}}
                       
                        <div class="w-full px-4 sm:px-6 md:px-8">
                            {{ $slot }}
                        </div>
                    </div>

                </main>
            </div>
        </div>

    </div>
    <x-navigations.footer></x-navigations.footer>
    @stack('modals')
    @stack('scripts')
    @livewireScripts
    <script defer src="https://unpkg.com/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
  
    <script src=" {{mix('js/app.js')}}" defer></script>


</body>

</html>