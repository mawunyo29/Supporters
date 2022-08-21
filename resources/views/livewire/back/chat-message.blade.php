<div @keydown.window.escape="open = false"
   x-init="$watch(&quot;open&quot;, o =&gt; !o &amp;&amp; window.setTimeout(() =&gt; (open = false), 1000))"
   x-show="open" aria-labelledby="slide-over-title" x-ref="dialog" aria-modal="true" class="bg-gray-900 ">
   <div class="absolute inset-y-0 overflow-hidden">
      <div x-description="Background overlay, show/hide based on slide-over state." class="absolute inset-0  "
         aria-hidden="true">

         <div class="fixed inset-y-0 right-0 z-20 flex max-w-full  mb-0 sm:pl-16">

            <div x-show="open" x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
               x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
               x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
               x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
               class="w-screen md:max-w-4xl " x-description="Slide-over panel, show/hide based on slide-over state."
               style="display: none">
               <div class="flex flex-col h-full py-6 mb-5 bg-gray-200 shadow-xl scrollbar dark:bg-gray-700">
                  <div class="px-4 sm:px-6 ">
                     <div class="flex items-start justify-between ">
                        <h2 class="text-lg font-medium text-gray-900 dark:text-white" id="slide-over-title">
                           Discussions
                           <ul class=" space-x-2 border-b-gray-400 flex flex-row chat_text">
                              @foreach ($current_user_join_or_leave as $item)
                              <li>
                                 {{$item}}
                              </li>

                              @endforeach
                           </ul>


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
                  <div class="relative flex-1 px-4 mt-5 sm:px-6  scrollbar">
                     {{-- chatbox --}}
                     <div class="chat_div flex flex-row rounded-md  p-1 absolute inset-0">
                        <div
                           class="nav_slide  bg-gray-900 text-purple-lighter flex-none w-24 px-6 hidden md:block rounded-l-md overflow-y-scroll scrollbar relative pt-3">


                           <div class="cursor-pointer mb-4 border-b border-gray-600  sticky top-0 ">
                              <div
                                 class="bg-white h-8 w-8 flex items-center justify-center text-black text-2xl font-semibold rounded-3xl mb-1 overflow-hidden">
                                 <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}">
                              </div>
                           </div>

                        </div>
                        <div class="flex flex-col  pb-6 w-64 overflow-hidden  relative bg-gray-800  hidden md:block">
                           <div
                              class=" friend_slide bg-gray-800 text-purple-lighter flex-none w-full  hidden md:block  overflow-y-scroll scrollbar ">
                              <div
                                 class="text-white  mt-3 px-4 flex justify-between border-b border-gray-600 py-1 shadow-xl absolute  w-64 ">
                                 <div class="flex-auto">
                                    <h1 class="font-semibold text-xl leading-tight mb-1 truncate">My Server
                                    </h1>
                                 </div>
                                 <div>
                                    <svg class="arrow-gKvcEx icon-2yIBmh opacity-50 cursor-pointer" width="24"
                                       height="24" viewBox="0 0 24 24">
                                       <path fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"
                                          d="M16.59 8.59004L12 13.17L7.41 8.59004L6 10L12 16L18 10L16.59 8.59004Z">
                                       </path>
                                    </svg>
                                 </div>
                              </div>


                           </div>
                           <div class="absolute w-full  bg-gray-700  bottom-0 p-2">
                              <div class="call-setting flex flex-row justify-evenly   w-full">
                                 <div class="hover:bg-slate-400 p-1 flex items-center rounded-md basis-1/2">
                                    <span>1</span>
                                 </div>
                                 <div
                                    class="flex flex-row justify-evenly first-letter basis-1/2 hover:bg-gray-700 space-x-1">
                                    <div class="setting hover:bg-slate-400 p-1 flex items-center rounded-md ring">
                                       <x-icons.icon class="icon text-white " icon="mic"></x-icons.icon>
                                    </div>
                                    <div class="setting hover:bg-slate-400 p-1 flex items-center rounded-md ring">
                                       <x-icons.icon class="icon text-white " icon="headphones"></x-icons.icon>
                                    </div>
                                    <div class="setting hover:bg-slate-400 p-1 flex items-center rounded-md ring">
                                       <span class=" sr-only">setting</span>
                                       <x-icons.icon class="icon text-white " icon="settings"></x-icons.icon>
                                    </div>
                                 </div>

                              </div>
                           </div>
                        </div>
                        <div
                           class=" rounded-r-md bg-slate-900 w-full  flex-grow relative flex-1 scrollbar overflow-hidden">

                           <div
                              class="messages_div  text-purple-lighter flex-none w-full  absolute top-0 z-40 bg-slate-900 ">
                              <div
                                 class="text-white mb-2 mt-3 px-4 flex justify-between border-b border-gray-600 py-1 shadow-xl  w-full">
                                 <div class="flex-auto">
                                    <h1 class="font-semibold text-xl leading-tight mb-1 truncate">Discussion
                                       Channel
                                    </h1>
                                 </div>
                                 <div>
                                    <svg class="arrow-gKvcEx icon-2yIBmh opacity-50 cursor-pointer" width="24"
                                       height="24" viewBox="0 0 24 24">
                                       <path fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"
                                          d="M16.59 8.59004L12 13.17L7.41 8.59004L6 10L12 16L18 10L16.59 8.59004Z">
                                       </path>
                                    </svg>
                                 </div>
                              </div>

                           </div>
                           <div class="general border-b-slate-700 text-white h-full relative w-full -mt-9 md:mt-0  ">
                              <div
                                 class=" messages relative  w-full  flex flex-col   rounded-t-lg dark:bg-gray-700 right-0 {{$taping?'block':'hidden' }}  overflow-y-scroll scrollbar"
                                 id="chatbox">
                                 @if (count($messages) > 0)
                                 <div class=" absolute bottom-0 min-h-0 h-20  
                                   w-full" id="message_content">
                                    @foreach ($messages as $currentMessage)
                                    @if ($currentMessage['user']['id'] == $user->id)
                                    <div
                                       class="border-b border-gray-600 p-1 flex items-start mb-0 text-sm hover:bg-gray-600 px-5 rounded-md"
                                       id="message.{{md5($loop->index)}}">
                                       @if ($currentMessage['user']['avatar'])
                                       <img src="{{ $currentMessage['user']['avatar'] }}"
                                          class="cursor-pointer w-8 h-8 rounded-3xl mr-3">
                                       @else
                                       <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}"
                                          class="cursor-pointer w-8 h-8 rounded-3xl mr-3">
                                       @endif

                                       <div class="flex-1 overflow-hidden">
                                          <div>
                                             <span class="font-bold text-red-300 cursor-pointer hover:underline">{{
                                                $currentMessage['user']['name'] }}</span>
                                             <span class="font-bold text-gray-400 text-xs"> {{ now() }}</span>
                                          </div>
                                          <p class="text-white leading-normal" id="message"> {!!
                                             htmlspecialchars($currentMessage['message']) !!}</p>
                                       </div>
                                    </div>
                                    {{-- <div
                                       class="flex items-start justify-between w-full border-b   p-3 mb-4 bg-gray-100  shadow-lg border-b-gray-600 dark:bg-gray-700 dark:text-white message will-change-scroll border-l-4 border-blue-300"
                                       id="message.{{md5($loop->index)}}">
                                       <div class="flex-1">
                                          <div class="flex items-center">
                                             <div class="flex-shrink-0">
                                                <img class="w-6 h-6 rounded-full"
                                                   src="{{ $currentMessage['user']['avatar'] }}" alt="">
                                             </div>
                                             <div class="ml-3">
                                                <div
                                                   class="text-sm font-medium leading-5 text-gray-900 dark:text-white">
                                                   {{ $currentMessage['user']['name'] }}
                                                </div>
                                                <div class="text-sm leading-5 text-gray-500 dark:text-white">
                                                   {{ now() }}
                                                </div>
                                             </div>
                                          </div>
                                          <div class="">
                                             <div
                                                class="w-full text-sm leading-5 text-justify text-gray-900 dark:text-white ">
                                                {{ $currentMessage['message'] }}
                                             </div>
                                          </div>
                                       </div>
                                    </div> --}}

                                    @else
                                    {{-- <div
                                       class="flex items-start justify-between py-1 mb-4  bg-gray-200 shadow-lg dark:bg-gray-600 dark:text-white message w-hull will-change-scroll border-l-4  border-lime-300"
                                       id="message_order.{{md5($loop->index)}}">
                                       <div class="flex-1">
                                          <div class="flex items-center">
                                             <div class="flex-shrink-0">
                                                <img class="w-6 h-6 rounded-full"
                                                   src="{{ $currentMessage['user']['avatar'] }}" alt="">
                                             </div>
                                             <div class="ml-4">
                                                <div
                                                   class="text-sm font-medium leading-5 text-gray-900 dark:text-white">
                                                   {{ $currentMessage['user']['name'] }}
                                                </div>
                                                <div class="text-sm leading-5 text-gray-500 dark:text-white">
                                                   {{ now()}}
                                                </div>
                                             </div>
                                          </div>
                                          <div class="">
                                             <div
                                                class="w-full text-sm leading-5 text-justify text-gray-900 dark:text-white ">
                                                {{ $currentMessage['message'] }}
                                             </div>
                                          </div>
                                       </div>
                                    </div> --}}
                                    <div
                                       class="border-b border-gray-600 p-1 flex items-start mb-0 text-sm hover:bg-gray-700 bg-gray-500 px-5 rounded-md"
                                       id="message.{{md5($loop->index)}}">
                                       @if ($currentMessage['user']['avatar'])
                                       <img src="{{ $currentMessage['user']['avatar'] }}"
                                          class="cursor-pointer w-8 h-8 rounded-3xl mr-3">
                                       @else
                                       <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}"
                                          class="cursor-pointer w-8 h-8 rounded-3xl mr-3">
                                       @endif
                                       <div class="flex-1 overflow-hidden">
                                          <div>
                                             <span class="font-bold text-red-300 cursor-pointer hover:underline">{{
                                                $currentMessage['user']['name'] }}</span>
                                             <span class="font-bold text-gray-400 text-xs"> {{ now() }}</span>
                                          </div>
                                          <p class="text-white leading-normal" id="message"> {!!
                                             htmlspecialchars($currentMessage['message']) !!}</p>
                                       </div>
                                    </div>
                                    @endif

                                    @endforeach

                                 </div>
                                 @endif

                              </div>

                              <div class=" fixed   md:w-1/4   right-2 bottom-32 " id="emojis">
                                 <form>
                                    @csrf
                                    <div
                                       class="  bg-white rounded-md hover:outline-none hover:ring-4 p-1 hover:ring-green-300 md:h-96 h-80 overflow-y-scroll">

                                       <ul
                                          class="emotions flex flex-wrap flex-col items-center  flex-grow w-full divide-y-1">
                                          @foreach (($data) as $key=> $emotions)
                                          <h1 class="text-base mb-2 text-gray-700  text-center uppercase">{{ $key}}</h1>
                                          <li class="text-gray-300 text-xl ring-1 p-1  mb-2 flex flex-wrap flex-row w-full  items-center justify-between  "
                                             wire:key="emotions.{{md5($key)}}">
                                             @foreach ($emotions as $emotionKey => $emotion)
                                             @if ($key)
                                             <input type="text" value="{{$emotion}}" class="emojis hidden">
                                             <button type="button" wire:key="{{$emotionKey}}"
                                                class="p-1 hover:bg-gray-400 rounded-md emoji_btn">
                                                <span class="text-lg space-x-1 " data="{{$emotion}}"
                                                   id="emojis.{{md5($emotionKey)}}">{!!$emotion !!}</span>
                                             </button>
                                             @endif
                                             @endforeach
                                          </li>
                                          @endforeach
                                       </ul>
                                    </div>
                                 </form>
                              </div>
                           </div>


                           {{-- unicode emoji --}}


                           <div class="container absolute  bottom-0 flex flex-col  mx-auto overflow-hidden  rounded-md">


                              <div class=" overflow-hidden md:mx-5 py-1 mx-2">
                                 <div
                                    class="flex w-full  bg-gray-700 rounded-lg b ring-2 dark:bg-gray-600 overflow-hidden p-1 hover:bg-gray-500  ">

                                    <x-icons.icon
                                       class="inline-flex items-center px-1 text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600"
                                       icon="data_saver_on"></x-icons.icon>
                                    <input type="text" id="inputMessage" wire:model='message'
                                       wire:keydown.enter="sendMessage()"
                                       class="rounded-none  bg-gray-50  text-gray-900  focus:border-transparent block flex-1 min-w-0 text-sm py-2.5  dark:bg-gray-700 dark:border-transparent dark:placeholder-gray-400 dark:text-white  appearance-non flex-wrap text-justify overflow-hidden "
                                       placeholder="message">

                                    <div class="inline-flex items-center">
                                       <button type="button"
                                          class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg px-5 py-2 mx-2  dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700   text-xl">{{$face}}</button>
                                    </div>

                                 </div>
                                 <div class="left-0 right-0 w-full   ">
                                    <div id="typingMessage"
                                       class="hidden w-full py-2.5  dark:text-white typing  rounded p-2 text-gray-100 font-bold text-sm text-center  mt-2">
                                    </div>
                                 </div>
                              </div>

                           </div>

                        </div>

                     </div>
                     <!-- Replace with your content -->

                     {{-- <div class="absolute inset-0">

                        <div class="flex flex-row  max-h-[800px] ">
                           <div class="w-20 bg-gray-300 flex  absolute inset-y-0 left-0 dark:bg-gray-600">
                              <div class="flex flex-col items-center px-2 py-1 ">
                                 <img class="w-8 h-8 rounded-full"
                                    src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80"
                                    alt="">
                              </div>
                           </div>
                           <div class="w-64 bg-gray-500 flex  h-full dark:bg-gray-600">
                              <div class="flex flex-col items-center px-2 py-1 ">
                                 <img class="w-8 h-8 rounded-full"
                                    src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80"
                                    alt="">
                              </div>
                              <div
                                 class="inset-y-0 flex flex-col overflow-y-auto bg-gray-900 scroll-auto max-h-[780px] py-12 -mt-12">
                                 <div class="  ">

                                    <div
                                       class="will-change-contents   widthcal  bottom-10 -my-8 scroll-auto  bg-gray-100 overflow-y-auto rounded-t-lg  scrollbar dark:bg-gray-700 right-0 {{$taping?'block':'hidden' }} will-change-scroll  ring-2 ring-green-400 overflow-y-scroll"
                                       id="chatbox">

                                       @if (count($messages) > 0)
                                       <div class="w-full  scroll-auto will-change-scroll scroll-my-20 ">

                                          @foreach ($messages as $currentMessage)
                                          @if ($currentMessage['user']['id'] == $user->id)
                                          <div
                                             class="flex items-start justify-between w-full px-3  bg-gray-100 border-b shadow-lg border-b-gray-300 dark:bg-gray-700 dark:text-white message will-change-scroll border-l-4 border-blue-300"
                                             id="message.{{md5($loop->index)}}">
                                             <div class="flex-1">
                                                <div class="flex items-center">
                                                   <div class="flex-shrink-0">
                                                      <img class="w-6 h-6 rounded-full"
                                                         src="{{ $currentMessage['user']['avatar'] }}" alt="">
                                                   </div>
                                                   <div class="ml-3">
                                                      <div
                                                         class="text-sm font-medium leading-5 text-gray-900 dark:text-white">
                                                         {{ $currentMessage['user']['name'] }}
                                                      </div>
                                                      <div class="text-sm leading-5 text-gray-500 dark:text-white">
                                                         {{ now() }}
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="">
                                                   <div
                                                      class="w-full text-sm leading-5 text-justify text-gray-900 dark:text-white ">
                                                      {{ $currentMessage['message'] }}
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          @else
                                          <div
                                             class="flex items-start justify-between px-3  bg-gray-200 shadow-lg dark:bg-gray-600 dark:text-white message w-hull will-change-scroll border-l-4  border-lime-300"
                                             id="message_order.{{md5($loop->index)}}">
                                             <div class="flex-1">
                                                <div class="flex items-center">
                                                   <div class="flex-shrink-0">
                                                      <img class="w-6 h-6 rounded-full"
                                                         src="{{ $currentMessage['user']['avatar'] }}" alt="">
                                                   </div>
                                                   <div class="ml-4">
                                                      <div
                                                         class="text-sm font-medium leading-5 text-gray-900 dark:text-white">
                                                         {{ $currentMessage['user']['name'] }}
                                                      </div>
                                                      <div class="text-sm leading-5 text-gray-500 dark:text-white">
                                                         {{ now()}}
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="">
                                                   <div
                                                      class="w-full text-sm leading-5 text-justify text-gray-900 dark:text-white ">
                                                      {{ $currentMessage['message'] }}
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          @endif

                                          @endforeach
                                       </div>
                                       <div class="h-24  pb-32 mb-12   "></div>
                                       @endif

                                    </div>
                                 </div>


                              </div>


                           </div>

                        </div>

                     </div> --}}
                     <!-- /End replace -->


                  </div>

                  {{-- <div class="relative -mt-10 bg-gray-200">

                     <div class="container absolute bottom-0 flex flex-col pt-10 mx-auto">
                        <div class="px-1">
                           <div class="flex w-full overflow-y-auto bg-gray-300 rounded-b-lg b ring-2 dark:bg-gray-700 ">

                              <x-icons.icon
                                 class="inline-flex items-center px-1 text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-bl-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600"
                                 icon="data_saver_on"></x-icons.icon>
                              <input type="text" id="inputMessage" wire:model='message'
                                 wire:change="chatMessage($event.target.value)"
                                 class="rounded-none  bg-gray-50  text-gray-900  focus:border-transparent block flex-1 min-w-0 text-sm py-2.5  dark:bg-gray-700 dark:border-transparent dark:placeholder-gray-400 dark:text-white  appearance-non flex-wrap text-justify "
                                 placeholder="message">
                              <span class="inline-flex items-center px-3">icon</span>
                           </div>
                        </div>


                        <div class="left-0 right-0 w-full bg-gray-200 dark:bg-gray-700">
                           <div id="typingMessage"
                              class="hidden w-full py-2.5  dark:text-white typing bg-gray-200  mx-2 px-2  rounded  text-gray-700 font-bold text-sm text-center dark:bg-gray-700">
                           </div>
                        </div>

                     </div>
                  </div> --}}

               </div>

            </div>

         </div>

      </div>
   </div>
   <script>
      window.addEventListener('livewire:load', function (e) {
         var emojis = document.getElementById('emojis');
         
         var emojiBtns = emojis.querySelectorAll('.emoji_btn');
         emojiBtns.forEach(function (btn) {
            btn.addEventListener('click', function (e) {
               var emoji = e.target.title;
               console.log(emoji);
               var input = document.getElementById('inputMessage');
               input.value = input.value + emoji;
               input.focus();
            });
         });
        
      });
   </script>
</div>