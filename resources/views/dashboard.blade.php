<x-app-layout>
    <x-slot name="header">
        <div class="">
            <img src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-dashboard/assets/img/drake.jpg"
                alt="avatar image"
                class="cursor-pointer inline-flex items-center justify-center w-12 h-12 mr-2 rounded-full text-white transition-all duration-200 ease-in-out text-size-sm rounded-circle" />
        </div>

    </x-slot>


    <div class="  ">
        @if (session('success'))

        <div class="  px-2 mx-auto mb-5 " data-modal id="modal_firstconnection" x-data="{open_modal:false}">

            <button @click="open_modal =true" id="btn_open" class=" hidden">message</button>
            <div id=show
                class=" sm:w-1/3 w-full rounded-lg shadow-md sm:ml-8  divide-x-2 absolute  overflow-hidden sm:px-2 ring-2 p-2 bg-white flex dark:bg-gray-800 z-20 "
                x-show="open_modal" x-on:close.stop="modal = false" x-on:keydown.escape.window="modal = false"
                x-transition:enter="transition ease-out duration-500 ease-out origin-left "
                x-transition:enter-start="opacity-0 transform scale-95 -translate-x-full"
                x-transition:enter-end="opacity-100 transform scale-100 "
                x-transition:leave="transition ease-in duration-500 origin-bottom"
                x-transition:leave-start="opacity-100 transform scale-100 "
                x-transition:leave-end="opacity-0 transform scale-95 -translate-x-full" style="display: none"
                role="alert">

                <div>
                    <h3 class="font-semibold text-xl text-gray-800 leading-tight dark:text-white">
                        {{ __(session('success')) }}
                    </h3>
                    <p class="mt-2 text-gray-600 dark:text-white">
                        {{ __('This is your dashboard, where you can manage your account, view your orders, and view
                        your
                        cart.') }}
                        {{ session('success') }}
                    </p>
                </div>
                <div class="flex justify-items-center justify-center relative cursor-pointer " id="close_modal"
                    @click="open_modal=false">
                    <span class="material-symbols-outlined justify-end py-8 ">
                        close
                    </span>
                </div>

            </div>
            <div>


            </div>
        </div>
        @endif
        @if (session('error'))


        <div id="alert-2" class="flex p-4 mb-4 bg-red-100 rounded-lg dark:bg-red-200 md:w-64" role="alert"
            x-data="{open_error_message:true}" x-init="{open_error_message:true}" x-show="open_error_message">
            <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-red-700 dark:text-red-800" fill="currentColor"
                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Info</span>
            <div class="ml-3 text-sm font-medium text-red-700 dark:text-red-800">
                A simple info alert with an <a href="#"
                    class="font-semibold underline hover:text-red-800 dark:hover:text-red-900">example link</a>.
                {{session('error')}}
            </div>
            <button type="button" @click="open_error_message= !open_error_message"
                class="ml-auto -mx-1.5 -my-1.5 bg-red-100 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-red-200 dark:text-red-600 dark:hover:bg-red-300"
                data-dismiss-target="#alert-2" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>

        @endif


        <!-- component -->
        {{-- <div class="flex flex-row h-screen antialiased text-gray-800  m-0 overflow-hidden ">
            <div class="flex flex-row w-96 flex-shrink-0 bg-gray-100 resize-x">
                <div class="flex flex-col items-center py-4 flex-shrink-0 w-20 dark:bg-indigo-700 rounded-3xl">
                    <a href="#"
                        class="flex items-center justify-center h-12 w-12 bg-indigo-100 text-indigo-800 rounded-full">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z">
                            </path>
                        </svg>
                    </a>
                    <ul class="flex flex-col space-y-2 mt-12">
                        <li>
                            <a href="#" class="flex items-center">
                                <span
                                    class="flex items-center justify-center text-indigo-100 hover:bg-indigo-700 h-12 w-12 rounded-2xl">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                        </path>
                                    </svg>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center">
                                <span
                                    class="flex items-center justify-center text-indigo-100 hover:bg-indigo-700 h-12 w-12 rounded-2xl">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                        </path>
                                    </svg>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center">
                                <span
                                    class="flex items-center justify-center text-indigo-100 hover:bg-indigo-700 h-12 w-12 rounded-2xl">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center">
                                <span
                                    class="flex items-center justify-center text-indigo-100 hover:bg-indigo-700 h-12 w-12 rounded-2xl">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <button
                        class="mt-auto flex items-center justify-center hover:text-indigo-100 text-indigo-500 h-10 w-10">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z">
                            </path>
                        </svg>
                    </button>
                </div>
                <div class="flex flex-col w-full h-full pl-4 pr-4 py-4 ">
                    <div class="flex flex-row items-center">
                        <div class="flex flex-row items-center">
                            <div class="text-xl font-semibold">Messages</div>
                            <div
                                class="flex items-center justify-center ml-2 text-xs h-5 w-5 text-white bg-red-500 rounded-full font-medium">
                                5</div>
                        </div>
                        <div class="ml-auto">
                            <button
                                class="flex items-center justify-center h-7 w-7 bg-gray-200 text-gray-500 rounded-full">
                                <svg class="w-4 h-4 stroke-current" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="mt-5">
                        <ul class="flex flex-row items-center justify-between">
                            <li>
                                <a href="#"
                                    class="flex items-center pb-3 text-xs font-semibold relative text-indigo-800">
                                    <span>All Conversations</span>
                                    <span class="absolute left-0 bottom-0 h-1 w-6 bg-indigo-800 rounded-full"></span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center pb-3 text-xs text-gray-700 font-semibold">
                                    <span>Archived</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center pb-3 text-xs text-gray-700 font-semibold">
                                    <span>Starred</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="mt-5">
                        <div class="text-xs text-gray-400 font-semibold uppercase">Team</div>
                    </div>
                    <div class="mt-2">
                        <div class="flex flex-col -mx-4">
                            <div class="relative flex flex-row items-center p-4">
                                <div class="absolute text-xs text-gray-500 right-0 top-0 mr-4 mt-3">5 min</div>
                                <div
                                    class="flex items-center justify-center h-10 w-10 rounded-full bg-pink-500 text-pink-300 font-bold flex-shrink-0">
                                    T
                                </div>
                                <div class="flex flex-col flex-grow ml-3">
                                    <div class="text-sm font-medium">Cuberto</div>
                                    <div class="text-xs truncate w-40">Lorem ipsum dolor sit amet, consectetur
                                        adipisicing elit. Debitis, doloribus?</div>
                                </div>
                                <div class="flex-shrink-0 ml-2 self-end mb-1">
                                    <span
                                        class="flex items-center justify-center h-5 w-5 bg-red-500 text-white text-xs rounded-full">5</span>
                                </div>
                            </div>
                            <div
                                class="flex flex-row items-center p-4 bg-gradient-to-r from-red-100 to-transparent border-l-2 border-red-500">
                                <div
                                    class="flex items-center justify-center h-10 w-10 rounded-full bg-pink-500 text-pink-300 font-bold flex-shrink-0">
                                    T
                                </div>
                                <div class="flex flex-col flex-grow ml-3">
                                    <div class="flex items-center">
                                        <div class="text-sm font-medium">UI Art Design</div>
                                        <div class="h-2 w-2 rounded-full bg-green-500 ml-2"></div>
                                    </div>
                                    <div class="text-xs truncate w-40">Lorem ipsum dolor sit amet, consectetur
                                        adipisicing elit. Debitis, doloribus?</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5">
                        <div class="text-xs text-gray-400 font-semibold uppercase">Personal</div>
                    </div>
                    <div class="h-full overflow-hidden relative pt-2">
                        <div class="flex flex-col divide-y h-full overflow-y-auto -mx-4">
                            <div class="flex flex-row items-center p-4 relative">
                                <div class="absolute text-xs text-gray-500 right-0 top-0 mr-4 mt-3">2 hours ago</div>
                                <div
                                    class="flex items-center justify-center h-10 w-10 rounded-full bg-pink-500 text-pink-300 font-bold flex-shrink-0">
                                    T
                                </div>
                                <div class="flex flex-col flex-grow ml-3">
                                    <div class="text-sm font-medium">Flo Steinle</div>
                                    <div class="text-xs truncate w-40">Good after noon! how can i help you?</div>
                                </div>
                                <div class="flex-shrink-0 ml-2 self-end mb-1">
                                    <span
                                        class="flex items-center justify-center h-5 w-5 bg-red-500 text-white text-xs rounded-full">3</span>
                                </div>
                            </div>
                            <div class="flex flex-row items-center p-4">
                                <div
                                    class="flex items-center justify-center h-10 w-10 rounded-full bg-pink-500 text-pink-300 font-bold flex-shrink-0">
                                    T
                                </div>
                                <div class="flex flex-col flex-grow ml-3">
                                    <div class="flex items-center">
                                        <div class="text-sm font-medium">Sarah D</div>
                                        <div class="h-2 w-2 rounded-full bg-green-500 ml-2"></div>
                                    </div>
                                    <div class="text-xs truncate w-40">Lorem ipsum dolor sit amet, consectetur
                                        adipisicing elit. Debitis, doloribus?</div>
                                </div>
                            </div>
                            <div class="flex flex-row items-center p-4">
                                <div
                                    class="flex items-center justify-center h-10 w-10 rounded-full bg-pink-500 text-pink-300 font-bold flex-shrink-0">
                                    T
                                </div>
                                <div class="flex flex-col flex-grow ml-3">
                                    <div class="flex items-center">
                                        <div class="text-sm font-medium">Sarah D</div>
                                        <div class="h-2 w-2 rounded-full bg-green-500 ml-2"></div>
                                    </div>
                                    <div class="text-xs truncate w-40">Lorem ipsum dolor sit amet, consectetur
                                        adipisicing elit. Debitis, doloribus?</div>
                                </div>
                            </div>
                            <div class="flex flex-row items-center p-4">
                                <div
                                    class="flex items-center justify-center h-10 w-10 rounded-full bg-pink-500 text-pink-300 font-bold flex-shrink-0">
                                    T
                                </div>
                                <div class="flex flex-col flex-grow ml-3">
                                    <div class="flex items-center">
                                        <div class="text-sm font-medium">Sarah D</div>
                                        <div class="h-2 w-2 rounded-full bg-green-500 ml-2"></div>
                                    </div>
                                    <div class="text-xs truncate w-40">Lorem ipsum dolor sit amet, consectetur
                                        adipisicing elit. Debitis, doloribus?</div>
                                </div>
                            </div>
                            <div class="flex flex-row items-center p-4">
                                <div
                                    class="flex items-center justify-center h-10 w-10 rounded-full bg-pink-500 text-pink-300 font-bold flex-shrink-0">
                                    T
                                </div>
                                <div class="flex flex-col flex-grow ml-3">
                                    <div class="flex items-center">
                                        <div class="text-sm font-medium">Sarah D</div>
                                        <div class="h-2 w-2 rounded-full bg-green-500 ml-2"></div>
                                    </div>
                                    <div class="text-xs truncate w-40">Lorem ipsum dolor sit amet, consectetur
                                        adipisicing elit. Debitis, doloribus?</div>
                                </div>
                            </div>
                        </div>
                        <div class="absolute bottom-0 right-0 mr-2">
                            <button
                                class="flex items-center justify-center shadow-sm h-10 w-10 bg-red-500 text-white rounded-full">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col h-full w-full bg-white px-4 py-6">
                <div class="flex flex-row items-center py-4 px-6 rounded-2xl shadow">
                    <div class="flex items-center justify-center h-10 w-10 rounded-full bg-pink-500 text-pink-100">
                        T
                    </div>
                    <div class="flex flex-col ml-3">
                        <div class="font-semibold text-sm">UI Art Design</div>
                        <div class="text-xs text-gray-500">Active</div>
                    </div>
                    <div class="ml-auto">
                        <ul class="flex flex-row items-center space-x-2">
                            <li>
                                <a href="#"
                                    class="flex items-center justify-center bg-gray-100 hover:bg-gray-200 text-gray-400 h-10 w-10 rounded-full">
                                    <span>
                                        <svg class="w-5 h-5" fill="currentColor" stroke="none" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                            </path>
                                        </svg>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center justify-center bg-gray-100 hover:bg-gray-200 text-gray-400 h-10 w-10 rounded-full">
                                    <span>
                                        <svg class="w-5 h-5" fill="currentColor" stroke="none" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center justify-center bg-gray-100 hover:bg-gray-200 text-gray-400 h-10 w-10 rounded-full">
                                    <span>
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z">
                                            </path>
                                        </svg>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="h-full overflow-hidden py-4">
                    <div class="h-full overflow-y-auto">
                        <div class="grid grid-cols-12 gap-y-2">
                            <div class="col-start-1 col-end-8 p-3 rounded-lg">
                                <div class="flex flex-row items-center">
                                    <div
                                        class="flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0">
                                        A
                                    </div>
                                    <div class="relative ml-3 text-sm bg-white py-2 px-4 shadow rounded-xl">
                                        <div>Hey How are you today?</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-start-1 col-end-8 p-3 rounded-lg">
                                <div class="flex flex-row items-center">
                                    <div
                                        class="flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0">
                                        A
                                    </div>
                                    <div class="relative ml-3 text-sm bg-white py-2 px-4 shadow rounded-xl">
                                        <div>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing
                                            elit. Vel ipsa commodi illum saepe numquam maxime
                                            asperiores voluptate sit, minima perspiciatis.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-start-6 col-end-13 p-3 rounded-lg">
                                <div class="flex items-center justify-start flex-row-reverse">
                                    <div
                                        class="flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0">
                                        A
                                    </div>
                                    <div class="relative mr-3 text-sm bg-indigo-100 py-2 px-4 shadow rounded-xl">
                                        <div>I'm ok what about you?</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-start-6 col-end-13 p-3 rounded-lg">
                                <div class="flex items-center justify-start flex-row-reverse">
                                    <div
                                        class="flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0">
                                        A
                                    </div>
                                    <div class="relative mr-3 text-sm bg-indigo-100 py-2 px-4 shadow rounded-xl">
                                        <div>
                                            Lorem ipsum dolor sit, amet consectetur adipisicing. ?
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-start-1 col-end-8 p-3 rounded-lg">
                                <div class="flex flex-row items-center">
                                    <div
                                        class="flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0">
                                        A
                                    </div>
                                    <div class="relative ml-3 text-sm bg-white py-2 px-4 shadow rounded-xl">
                                        <div>Lorem ipsum dolor sit amet !</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-start-6 col-end-13 p-3 rounded-lg">
                                <div class="flex items-center justify-start flex-row-reverse">
                                    <div
                                        class="flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0">
                                        A
                                    </div>
                                    <div class="relative mr-3 text-sm bg-indigo-100 py-2 px-4 shadow rounded-xl">
                                        <div>
                                            Lorem ipsum dolor sit, amet consectetur adipisicing. ?
                                        </div>
                                        <div class="absolute text-xs bottom-0 right-0 -mb-5 mr-2 text-gray-500">
                                            Seen
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-start-1 col-end-8 p-3 rounded-lg">
                                <div class="flex flex-row items-center">
                                    <div
                                        class="flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0">
                                        A
                                    </div>
                                    <div class="relative ml-3 text-sm bg-white py-2 px-4 shadow rounded-xl">
                                        <div>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                            Perspiciatis, in.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-start-1 col-end-8 p-3 rounded-lg">
                                <div class="flex flex-row items-center">
                                    <div
                                        class="flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0">
                                        A
                                    </div>
                                    <div class="relative ml-3 text-sm bg-white py-2 px-4 shadow rounded-xl">
                                        <div class="flex flex-row items-center">
                                            <button
                                                class="flex items-center justify-center bg-indigo-600 hover:bg-indigo-800 rounded-full h-8 w-10">
                                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="1.5"
                                                        d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z">
                                                    </path>
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="1.5" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                                    </path>
                                                </svg>
                                            </button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-row items-center">
                    <div class="flex flex-row items-center w-full border rounded-3xl h-12 px-2">
                        <button class="flex items-center justify-center h-10 w-10 text-gray-400 ml-1">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z">
                                </path>
                            </svg>
                        </button>
                        <div class="w-full">
                            <input type="text"
                                class="border border-transparent w-full focus:outline-none text-sm h-10 flex items-center"
                                placeholder="Type your message....">
                        </div>
                        <div class="flex flex-row">
                            <button class="flex items-center justify-center h-10 w-8 text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13">
                                    </path>
                                </svg>
                            </button>
                            <button class="flex items-center justify-center h-10 w-8 text-gray-400 ml-1 mr-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="ml-6">
                        <button
                            class="flex items-center justify-center h-10 w-10 rounded-full bg-gray-200 hover:bg-gray-300 text-indigo-800 text-white">
                            <svg class="w-5 h-5 transform rotate-90 -mr-px" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="md:flex md:flex-row relative block z-0">
            <div class="  md:w-1/2  md:absolute overflow-auto will-change-scroll w-full">

                Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident, quos repellendus voluptate itaque
                vitae quia facilis. Adipisci, esse. Architecto laudantium dolorum earum velit. Temporibus vitae nam,
                repudiandae nobis optio facere.


            </div>
            <div class=" md:w-1/2 md:absolute right-0 w-full">

                Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident, quos repellendus voluptate itaque
                vitae quia facilis. Adipisci, esse. Architecto laudantium dolorum earum velit. Temporibus vitae nam,
                repudiandae nobis optio facere.

            </div>
        </div>


    </div>
    @if ( Route::currentRouteName() == 'add_to_friends')
    @livewire('back.friends-controller', ['user' => $user ])
    @endif
    @if (Route::currentRouteName() == 'notifications')
    <div class=" w-72 bottom-0 -ml-12 min-h-full p-2 relative  bg-slate-400 rounded-lg shrink-0 shadow-sm hover:shadow-lg ">
        <ul class="bg-white dark:bg-gray-900 relative space-y-1 rounded-md hover:bg-gray-100 cursor-pointer overflow-y-auto ">
            @foreach ($notifications as $notification)
                <li wire:key='{{md5($notification->id)}}' class="transform text-gray-800   origin-left  test bg-gray-300 group-hover:bg-gray-700 border-b border-b-slate-500 dark:border-b-white dark:text-white hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md text-center  ease-in-out transition duration-300">{{$notification->data['name']}} <span class="ml-1"> {{__(' vous demande en ami')}}</span>
                    <div class=" flex items-center space-x-3 mx-1">
                        <button class="flex items-center justify-center h-6 w-6 rounded-full bg-gray-200 hover:bg-gray-300 text-green-800 ">
                            <span class="material-symbols-outlined text-base">
                                person_add
                                </span>
                          
                        </button>
                        <button class="flex items-center justify-center h-6 w-6 rounded-full bg-gray-200 hover:bg-gray-300 text-red-800">
                            <span class="material-symbols-outlined text-base">
                                layers_clear
                                </span>
                        </button>
    
                    </div>
                </li>
                
                
              
            @endforeach
        </ul>
    </div>
    @endif

   
   
    @push('scripts')
    <script>
        window.addEventListener('load', function () {
           
            const btn = document.getElementById('btn_open');
            
            if(btn){
                btn.click();
            }

          
          
        });
      
    </script>

    @endpush
</x-app-layout>