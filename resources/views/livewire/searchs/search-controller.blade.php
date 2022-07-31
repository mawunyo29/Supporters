<div class=" mt-4 w-full overflow-hidden " x-data="{isSearch:false}">
    <div class="relative w-full cursor-pointer" @click="isSearch = !isSearch">
        <input type="search" id="location-search&quot;" name="search" autocomplete="false"
            class="block hover:shadow-md p-2.5 w-full px-10  text-sm text-gray-900 bg-gray-50 rounded-r-lg rounded-l-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
            placeholder="Search for city or address"  disabled>

        <button type="button" class="flex absolute inset-y-0 right-0 items-center pr-4">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white"
                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M7 4a3 3 0 016 0v4a3 3 0 11-6 0V4zm4 10.93A7.001 7.001 0 0017 8a1 1 0 10-2 0A5 5 0 015 8a1 1 0 00-2 0 7.001 7.001 0 006 6.93V17H6a1 1 0 100 2h8a1 1 0 100-2h-3v-2.07z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
    </div>


    <!-- Main modal -->
    <div id="crypto-modal" tabindex="-1" x-show="isSearch" x-transition:enter="transition ease-out duration-500"
        x-transition:enter-start="opacity-0 -translate-y-full" x-transition:enter-end="opacity-100"
        x-transition:leave="transition  ease-in duration-500" x-transition:leave-start="opacity-100 -translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-full"
        class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center flex"
        aria-modal="true" role="dialog" style="display: none">
        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" @click="isSearch = false" 
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    data-modal-toggle="crypto-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                
                <!-- Modal header -->
                <div class="py-4 px-6 rounded-t border-b dark:border-gray-600">
                    <h3 class="text-base font-semibold text-gray-900 lg:text-xl dark:text-white">
                        Search users
                    </h3>
                </div>
                <!-- Modal body -->
                <div class="p-6 border-b dark:border-gray-600 ">
                    <form class=" grow ">
                        <div class=" ">
                            <label for="location-search"
                                class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Users
                            </label>

                            <div class="relative w-full">
                                <div class="relative w-full">
                                    <input type="search" id="location-search&quot;" name="search" wire:model='search'
                                        class="block hover:shadow-md p-2.5 w-full px-10  text-sm text-gray-900 bg-gray-50 rounded-r-lg rounded-l-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                                        placeholder="Search for city or address" required="">

                                    <button type="button" class="flex absolute inset-y-0 right-0 items-center pr-4">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white"
                                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M7 4a3 3 0 016 0v4a3 3 0 11-6 0V4zm4 10.93A7.001 7.001 0 0017 8a1 1 0 10-2 0A5 5 0 015 8a1 1 0 00-2 0 7.001 7.001 0 006 6.93V17H6a1 1 0 100 2h8a1 1 0 100-2h-3v-2.07z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </div>

                                <button type="submit"
                                    class="absolute top-0 left-0 p-2.5  text-sm font-medium text-white bg-blue-700 rounded-l-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><svg
                                        class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </button>

                            </div>
                        </div>

                    </form>


                    <ul class="my-4 space-y-3">

                        @if ($search =="")
                        <p class="text-sm font-normal text-gray-500 dark:text-gray-400">search users to and send theme invitation</p>

                        @else
                        @if (collect($users)->isEmpty())
                        <p class="text-sm font-normal text-gray-500 dark:text-gray-400">No results found</p>

                        @else
                        @foreach ($users as $user)
                       
                        <li>
                            <a href="{{route("add_to_friends",$user->id)}}"
                                class="flex items-center p-3 text-base font-bold text-gray-900 bg-gray-50 rounded-lg hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                                <div class="flex-shrink-0">
                                    <img class="w-10 h-10 rounded-full" src="{{$user->avatar}}" alt="">
                                </div>
                                <span class="flex-1 ml-3 whitespace-nowrap">{{$user->name}}</span>
                            </a>
                        </li>
                        @endforeach
                        @endif


                        @endif



                    </ul>
                    <div>
                        <a href="#"
                            class="inline-flex items-center text-xs font-normal text-gray-500 hover:underline dark:text-gray-400">
                            <svg aria-hidden="true" class="mr-2 w-3 h-3" focusable="false" data-prefix="far"
                                data-icon="question-circle" role="img" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512">
                                <path fill="currentColor"
                                    d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 448c-110.532 0-200-89.431-200-200 0-110.495 89.472-200 200-200 110.491 0 200 89.471 200 200 0 110.53-89.431 200-200 200zm107.244-255.2c0 67.052-72.421 68.084-72.421 92.863V300c0 6.627-5.373 12-12 12h-45.647c-6.627 0-12-5.373-12-12v-8.659c0-35.745 27.1-50.034 47.579-61.516 17.561-9.845 28.324-16.541 28.324-29.579 0-17.246-21.999-28.693-39.784-28.693-23.189 0-33.894 10.977-48.942 29.969-4.057 5.12-11.46 6.071-16.666 2.124l-27.824-21.098c-5.107-3.872-6.251-11.066-2.644-16.363C184.846 131.491 214.94 112 261.794 112c49.071 0 101.45 38.304 101.45 88.8zM298 368c0 23.159-18.841 42-42 42s-42-18.841-42-42 18.841-42 42-42 42 18.841 42 42z">
                                </path>
                            </svg>
                            Why do I need to connect with my wallet?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
 
</div>