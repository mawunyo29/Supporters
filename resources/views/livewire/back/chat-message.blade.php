<div @keydown.window.escape="open = false"
    x-init="$watch(&quot;open&quot;, o =&gt; !o &amp;&amp; window.setTimeout(() =&gt; (open = false), 1000))"
    x-show="open" aria-labelledby="slide-over-title" x-ref="dialog" aria-modal="true">
    <div class="absolute inset-y-0 overflow-hidden">
        <div x-description="Background overlay, show/hide based on slide-over state." class="absolute inset-0"
            aria-hidden="true">

            <div class="fixed inset-y-0 right-0 z-20 flex max-w-full pl-10 sm:pl-16">

                <div x-show="open" x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
                    x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
                    x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
                    x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
                    class="w-screen max-w-2xl " x-description="Slide-over panel, show/hide based on slide-over state."
                    style="display: none">
                    <div class="flex flex-col h-full py-6 bg-gray-100 shadow-xl scrollbar dark:bg-gray-700">
                        <div class="px-4 sm:px-6  ">
                            <div class="flex items-start justify-between ">
                                <h2 class="text-lg font-medium text-gray-900 dark:text-white" id="slide-over-title">
                                    Discussions
                                </h2>
                                <div class="flex items-center ml-3 h-7">
                                    <button type="button"
                                        class="text-gray-400 bg-white rounded-md hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                        @click="open = false">
                                        <span class="sr-only">Close panel</span>
                                        <svg class="w-6 h-6" x-description="Heroicon name: outline/x"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="relative flex-1 px-4 mt-6 sm:px-6 ">
                            <!-- Replace with your content -->
                            <div class="absolute inset-0 flex flex-col ">
                                <div class="">
                                    {{-- {{$i%2==0?'border-l-green-300
                                    ring-green-400':($i%3==0?'border-l-blue-300':'border-l-pink-300')}} --}}
                                    {{-- <ul class="px-2">
                                        <li
                                            class="my-2 border-l-2 rounded-lg shadow-md border-b-gray-300 ring-2 dark:bg-gray-700 ">
                                            <img class="w-8 h-8 rounded-full"
                                                src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80"
                                                alt="">
                                            <p class="items-center p-1 text-justify-center">
                                                {{$taping}}</p>
                                        </li>

                                    </ul> --}}
                                    <div class=" flex flex-row justify-between static">
                                        <div
                                            class="w-20 bg-gray-200 flex  absolute max-h-[800px] inset-y-0 left-0 dark:bg-gray-600">
                                            <div class=" flex flex-col items-center px-2 py-1">
                                                <img class="w-8 h-8 rounded-full"
                                                    src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80"
                                                    alt="">
                                            </div>
                                        </div>
                                        <div class="min-h-0 max-h-[770px] widthcal  absolute  scroll-auto  bottom-10 bg-gray-100 overflow-y-auto rounded-t-lg  scrollbar dark:bg-gray-700 right-0 {{$taping?'block':'hidden' }} "
                                            id="chatbox">

                                            @if (count($messages) > 0)
                                            @foreach ($messages as $currentMessage)
                                            @if ($currentMessage['user']['id'] == auth()->user()->id)
                                            <div
                                                class="flex items-start justify-between p-3 space-y-1 bg-gray-100 border-b shadow-lg border-b-gray-300 dark:bg-gray-700 dark:text-white w-full  message">
                                                <div class="flex-1">
                                                    <div class="flex items-center">
                                                        <div class="flex-shrink-0">
                                                            <img class="w-8 h-8 rounded-full"
                                                                src="{{ $currentMessage['user']['avatar'] }}" alt="">
                                                        </div>
                                                        <div class="ml-3">
                                                            <div
                                                                class="text-sm font-medium leading-5 text-gray-900 dark:text-white">
                                                                {{ $currentMessage['user']['name'] }}
                                                            </div>
                                                            <div
                                                                class="text-sm leading-5 text-gray-500 dark:text-white">
                                                                {{ now() }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mt-2">
                                                        <div
                                                            class="text-sm leading-5 text-gray-900 dark:text-white  text-justify">
                                                            {{ $currentMessage['message'] }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @else
                                            <div
                                                class="flex items-start justify-between p-3 bg-gray-200 shadow-lg dark:bg-gray-600 dark:text-white message w-hull space-y-1">
                                                <div class="flex-1">
                                                    <div class="flex items-center">
                                                        <div class="flex-shrink-0">
                                                            <img class="w-12 h-12 rounded-full"
                                                                src="{{ $currentMessage['user']['avatar'] }}" alt="">
                                                        </div>
                                                        <div class="ml-4">
                                                            <div
                                                                class="text-sm font-medium leading-5 text-gray-900 dark:text-white">
                                                                {{ $currentMessage['user']['name'] }}
                                                            </div>
                                                            <div
                                                                class="text-sm leading-5 text-gray-500 dark:text-white">
                                                                {{ now()}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mt-2">
                                                        <div class="text-sm leading-5 text-gray-900 dark:text-white">
                                                            {{ $currentMessage['message'] }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif

                                            @endforeach
                                            @endif

                                        </div>

                                    </div>

                                </div>



                            </div>
                            <!-- /End replace -->
                        </div>

                    </div>
                    <div class=" relative bg-gray-200 ">
                        <div class="container absolute bottom-0  flex flex-col  mx-auto pt-10">
                            <div class="px-1">
                                <div
                                    class="flex w-full overflow-y-auto bg-gray-300 rounded-b-lg b ring-2 dark:bg-gray-700 ">

                                    <x-icons.icon
                                        class="inline-flex items-center px-1 text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-bl-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600"
                                        icon="data_saver_on"></x-icons.icon>
                                    <input type="text" id="inputMessage" wire:model='message'
                                        wire:change="chatMessage($event.target.value)"
                                        class="rounded-none  bg-gray-50  text-gray-900  focus:border-transparent block flex-1 min-w-0 text-sm py-2.5  dark:bg-gray-700 dark:border-transparent dark:placeholder-gray-400 dark:text-white  appearance-none"
                                        placeholder="message">
                                    <span class="inline-flex items-center px-3">icon</span>
                                </div>
                            </div>


                            <div class="w-full bg-gray-200 left-0 right-0 dark:bg-gray-700">
                                <div id="typingMessage"
                                    class="hidden w-full py-2.5  dark:text-white typing bg-gray-200  mx-2 px-2  rounded  text-gray-700 font-bold text-sm text-center dark:bg-gray-700">
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
</div>