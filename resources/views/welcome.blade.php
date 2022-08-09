<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
    <link rel="stylesheet" href="{{mix('css/build.css')}}">
    <link rel="stylesheet" href="{{mix('css/homepage.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        body {
            margin: 0
        }

        a {
            background-color: transparent
        }

        [hidden] {
            display: none
        }

        html {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            line-height: 1.5
        }

        *,
        :after,
        :before {
            box-sizing: border-box;
            border: 0 solid #e2e8f0
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        svg,
        video {
            display: block;
            vertical-align: middle
        }

        video {
            max-width: 100%;
            height: auto
        }

        .bg-white {
            --bg-opacity: 1;
            background-color: #fff;
            background-color: rgba(255, 255, 255, var(--bg-opacity))
        }

        .bg-gray-100 {
            --bg-opacity: 1;
            background-color: #f7fafc;
            background-color: rgba(247, 250, 252, var(--bg-opacity))
        }

        .border-gray-200 {
            --border-opacity: 1;
            border-color: #edf2f7;
            border-color: rgba(237, 242, 247, var(--border-opacity))
        }

        .border-t {
            border-top-width: 1px
        }

        .flex {
            display: flex
        }

        .grid {
            display: grid
        }

        .hidden {
            display: none
        }

        .items-center {
            align-items: center
        }

        .justify-center {
            justify-content: center
        }

        .font-semibold {
            font-weight: 600
        }

        .h-5 {
            height: 1.25rem
        }

        .h-8 {
            height: 2rem
        }

        .h-16 {
            height: 4rem
        }

        .text-sm {
            font-size: .875rem
        }

        .text-lg {
            font-size: 1.125rem
        }

        .leading-7 {
            line-height: 1.75rem
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto
        }

        .ml-1 {
            margin-left: .25rem
        }

        .mt-2 {
            margin-top: .5rem
        }

        .mr-2 {
            margin-right: .5rem
        }

        .ml-2 {
            margin-left: .5rem
        }

        .mt-4 {
            margin-top: 1rem
        }

        .ml-4 {
            margin-left: 1rem
        }

        .mt-8 {
            margin-top: 2rem
        }

        .ml-12 {
            margin-left: 3rem
        }

        .-mt-px {
            margin-top: -1px
        }

        .max-w-6xl {
            max-width: 72rem
        }

        .min-h-screen {
            min-height: 100vh
        }

        .overflow-hidden {
            overflow: hidden
        }

        .p-6 {
            padding: 1.5rem
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem
        }

        .pt-8 {
            padding-top: 2rem
        }

        .fixed {
            position: fixed
        }

        .relative {
            position: relative
        }

        .top-0 {
            top: 0
        }

        .right-0 {
            right: 0
        }

        .shadow {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06)
        }

        .text-center {
            text-align: center
        }

        .text-gray-200 {
            --text-opacity: 1;
            color: #edf2f7;
            color: rgba(237, 242, 247, var(--text-opacity))
        }

        .text-gray-300 {
            --text-opacity: 1;
            color: #e2e8f0;
            color: rgba(226, 232, 240, var(--text-opacity))
        }

        .text-gray-400 {
            --text-opacity: 1;
            color: #cbd5e0;
            color: rgba(203, 213, 224, var(--text-opacity))
        }

        .text-gray-500 {
            --text-opacity: 1;
            color: #a0aec0;
            color: rgba(160, 174, 192, var(--text-opacity))
        }

        .text-gray-600 {
            --text-opacity: 1;
            color: #718096;
            color: rgba(113, 128, 150, var(--text-opacity))
        }

        . {
            --text-opacity: 1;
            color: #4a5568;
            color: rgba(74, 85, 104, var(--text-opacity))
        }

        .text-gray-900 {
            --text-opacity: 1;
            color: #1a202c;
            color: rgba(26, 32, 44, var(--text-opacity))
        }

        .underline {
            text-decoration: underline
        }

        .antialiased {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        .w-5 {
            width: 1.25rem
        }

        .w-8 {
            width: 2rem
        }

        .w-auto {
            width: auto
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr))
        }

        @media (min-width:640px) {
            .sm\:rounded-lg {
                border-radius: .5rem
            }

            .sm\:block {
                display: block
            }

            .sm\:items-center {
                align-items: center
            }

            .sm\:justify-start {
                justify-content: flex-start
            }

            .sm\:justify-between {
                justify-content: space-between
            }

            .sm\:h-20 {
                height: 5rem
            }

            .sm\:ml-0 {
                margin-left: 0
            }

            .sm\:px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem
            }

            .sm\:pt-0 {
                padding-top: 0
            }

            .sm\:text-left {
                text-align: left
            }

            .sm\:text-right {
                text-align: right
            }
        }

        @media (min-width:768px) {
            .md\:border-t-0 {
                border-top-width: 0
            }

            .md\:border-l {
                border-left-width: 1px
            }

            .md\:grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr))
            }
        }

        @media (min-width:1024px) {
            .lg\:px-8 {
                padding-left: 2rem;
                padding-right: 2rem
            }
        }

        @media (prefers-color-scheme:dark) {
            .dark\:bg-gray-800 {
                --bg-opacity: 1;
                background-color: #2d3748;
                background-color: rgba(45, 55, 72, var(--bg-opacity))
            }

            .dark\:bg-gray-900 {
                --bg-opacity: 1;
                background-color: #1a202c;
                background-color: rgba(26, 32, 44, var(--bg-opacity))
            }

            .dark\:border-gray-700 {
                --border-opacity: 1;
                border-color: #4a5568;
                border-color: rgba(74, 85, 104, var(--border-opacity))
            }

            .dark\:text-white {
                --text-opacity: 1;
                color: #fff;
                color: rgba(255, 255, 255, var(--text-opacity))
            }

            .dark\:text-gray-400 {
                --text-opacity: 1;
                color: #cbd5e0;
                color: rgba(203, 213, 224, var(--text-opacity))
            }

            .dark\:text-gray-500 {
                --tw-text-opacity: 1;
                color: #6b7280;
                color: rgba(107, 114, 128, var(--tw-text-opacity))
            }
        }
    </style>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
    <script defer src="https://unpkg.com/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="antialiased" x-data="{open_responsive_link :false ,scrollToTop:false}"
    x-init="window.pageYOffset >100 ? scrollToTop :!scrollToTop"
    @scroll.window="window.pageYOffset >100 ? scrollToTop= true :scrollToTop= false"
    :class="{'overflow-hidden':open_responsive_link ,'overflow-auto':!open_responsive_link}">

    <div class="min-h-screen">
        <header
            class="fixed z-50 flex items-center justify-between flex-shrink-0 w-full h-20 px-4 text-white bg-blue-700 md:px-12 justify-items-stretch dark:bg-gray-900"
            :class="{'md:h-24 h-20':scrollToTop ,'md:h-20 h-16':!scrollToTop}">
            <div class="flex items-center">
                <a href="{{ route('home') }}">
                    <x-icons.logosupporters
                        x-bind:class="{'md:h-20 md:w-20 h-16 w-16':scrollToTop ,'md:h-16 md:w-16 h-12 w-12':!scrollToTop}" />
                </a>
            </div>
            @if (Route::has('login'))
            <div class="hidden px-6 py-4 sm:block">
                @auth
                <a href="{{ url('/dashboard') }}" class="text-sm underline dark:text-gray-500">Dashboard</a>
                @else
                <a href="{{ route('login') }}" class="text-sm underline dark:text-gray-500">Log in</a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-sm underline dark:text-gray-500">Register</a>
                @endif
                @endauth
            </div>
            @endif
            <div class="p-2 md:hidden ">
                <button
                    class="flex items-center px-3 text-white transition duration-300 ease-in-out border border-transparent rounded-none appearance-none dark:bg-gray-900 dark:hover:text-white focus:outline-none focus:shadow-outline "
                    @click="open_responsive_link = !open_responsive_link"
                    :class="{' tranform rotate-180 duration-300':open_responsive_link}">
                    <x-icons.menu-responsive />
                </button>
                <div class="fixed inset-x-0 min-h-screen p-4 text-white bg-blue-700 dark:text-white"
                    x-show="open_responsive_link" x-transition:enter="transition ease-in-out duration-300 transform"
                    x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
                    x-transition:leave="transition ease-in-out duration-300 transform"
                    x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full">
                    <ul class="pt-8 space-y-3 " x-show="open_responsive_link"
                        x-transition:enter="ease-in-out duration-300" x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100" x-transition:leave="ease-in-out duration-300"
                        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                        <li>Home</li>
                        <li>Login</li>
                        <li>Register</li>
                    </ul>
                </div>


            </div>


        </header>
        <div class="relative min-h-full md:min-h-screen">
            <img src="{{asset('images/mario-klassen-70YxSTWa2Zw-unsplash.jpg')}}"
                class="min-h-full bg-center bg-auto hover:bg-contain" alt="">
            <section class="text-gray-600 body-font">
                <div class="container px-5 py-24 mx-auto">
                    <div class="flex flex-col text-center w-full mb-20">
                        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Supporters</h1>
                        <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Support Your team</p>
                    </div>
                    <div class="flex flex-wrap -m-2">
                        <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                            <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                                <img alt="team"
                                    class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4"
                                    src="https://dummyimage.com/80x80">
                                <div class="flex-grow">
                                    <h2 class="text-gray-900 title-font font-medium">Foot</h2>
                                    <p class="text-gray-500">UI Designer</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                            <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                                <img alt="team"
                                    class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4"
                                    src="https://dummyimage.com/84x84">
                                <div class="flex-grow">
                                    <h2 class="text-gray-900 title-font font-medium">Volley</h2>
                                    <p class="text-gray-500">CTO</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                            <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                                <img alt="team"
                                    class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4"
                                    src="https://dummyimage.com/88x88">
                                <div class="flex-grow">
                                    <h2 class="text-gray-900 title-font font-medium">Basket</h2>
                                    <p class="text-gray-500">Founder</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                            <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                                <img alt="team"
                                    class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4"
                                    src="https://dummyimage.com/90x90">
                                <div class="flex-grow">
                                    <h2 class="text-gray-900 title-font font-medium">Tenis</h2>
                                    <p class="text-gray-500">DevOps</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                            <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                                <img alt="team"
                                    class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4"
                                    src="https://dummyimage.com/94x94">
                                <div class="flex-grow">
                                    <h2 class="text-gray-900 title-font font-medium">Box</h2>
                                    <p class="text-gray-500">Software Engineer</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                            <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                                <img alt="team"
                                    class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4"
                                    src="https://dummyimage.com/98x98">
                                <div class="flex-grow">
                                    <h2 class="text-gray-900 title-font font-medium">Rugby</h2>
                                    <p class="text-gray-500">UX Researcher</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                            <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                                <img alt="team"
                                    class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4"
                                    src="https://dummyimage.com/100x90">
                                <div class="flex-grow">
                                    <h2 class="text-gray-900 title-font font-medium">Cycliste</h2>
                                    <p class="text-gray-500">QA Engineer</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                            <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                                <img alt="team"
                                    class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4"
                                    src="https://dummyimage.com/104x94">
                                <div class="flex-grow">
                                    <h2 class="text-gray-900 title-font font-medium">Auto</h2>
                                    <p class="text-gray-500">System</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                            <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                                <img alt="team"
                                    class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4"
                                    src="https://dummyimage.com/108x98">
                                <div class="flex-grow">
                                    <h2 class="text-gray-900 title-font font-medium">Rodrigo Monchi</h2>
                                    <p class="text-gray-500">Product Manager</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
        <div class="h-full">
            <div class=" bg-black">
                <div class="min-h-full md:min-h-screen ">
                    <div class="swiper mySwiper  ">
                        <div class="swiper-wrapper ">

                            <div class="swiper-slide"> <img
                                    src="{{asset('images/adam-winger-oh6FswCTTmY-unsplash.jpg')}}" alt=""
                                    class="min-h-full bg-center bg-auto hover:bg-contain"></div>
                            <div class="swiper-slide"><img
                                    src="{{asset('images/vietnam-beautiful-HBVUlxJSKrs-unsplash.jpg')}}" alt=""
                                    class="min-h-full bg-center bg-auto hover:bg-contain"></div>
                            <div class="swiper-slide"><img
                                    src="{{asset('images/jose-pablo-dominguez-yu5HFpQkQEc-unsplash.jpg')}}" alt=""
                                    class="min-h-full bg-center bg-auto hover:bg-contain"></div>
                            <div class="swiper-slide"><img
                                    src="{{asset('images/ellen-kerbey-iWvYK7IxYic-unsplash.jpg')}}" alt=""
                                    class="min-h-full bg-center bg-auto hover:bg-contain"></div>
                            <div class="swiper-slide"><img
                                    src="{{asset('images/richard-boyle-KGvLHzpOiaQ-unsplash.jpg')}}" alt=""></div>
                            <div class="swiper-slide"><img
                                    src="{{asset('images/bertrand-gabioud-WHSXpNZj_8w-unsplash.jpg')}}" alt=""
                                    class="min-h-full bg-center bg-auto hover:bg-contain"></div>
                            <div class="swiper-slide"> <img
                                    src="{{asset('images/ellen-kerbey-iWvYK7IxYic-unsplash.jpg')}}" alt=""
                                    class="min-h-full bg-center bg-auto hover:bg-contain"> </div>

                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <footer class="text-gray-600 bg-blue-600 body-font">
        <div class="flex flex-col items-center px-4 py-8 sm:flex-row md:px-12">
            <a class="flex items-center justify-center font-medium text-gray-900 title-font md:justify-start ">
                <x-icons.logosupporters class="h-12 fill-pink-600 dark:fill-red-900" />
                <span class="ml-3 text-xl text-white uppercase">{{config('app.name')}}</span>
            </a>
            <p class="mt-4 text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0">©
                2020 {{config('app.name')}} —
                <a href="https://twitter.com/knyttneve" class="ml-1 text-gray-600" rel="noopener noreferrer"
                    target="_blank">@komla</a>
            </p>
            <span class="inline-flex justify-center mt-4 sm:ml-auto sm:mt-0 sm:justify-start">
                <a class="text-gray-500">
                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        class="w-5 h-5" viewBox="0 0 24 24">
                        <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                    </svg>
                </a>
                <a class="ml-3 text-gray-500">
                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        class="w-5 h-5" viewBox="0 0 24 24">
                        <path
                            d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                        </path>
                    </svg>
                </a>
                <a class="ml-3 text-gray-500">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                        <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                        <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                    </svg>
                </a>
                <a class="ml-3 text-gray-500">
                    <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
                        <path stroke="none"
                            d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z">
                        </path>
                        <circle cx="4" cy="4" r="2" stroke="none"></circle>
                    </svg>
                </a>
            </span>
        </div>
    </footer>
    <script src="{{mix('js/custome.js')}}"></script>


    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
          spaceBetween: 30,
          centeredSlides: true,
          autoplay: {
            delay: 2500,
            disableOnInteraction: false,
          },
          pagination: {
            el: ".swiper-pagination",
            clickable: true,
          },
          navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
          },
        });
    </script>
</body>

</html>