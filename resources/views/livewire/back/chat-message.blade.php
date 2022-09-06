<div @keydown.window.escape="open = false"
   x-init="$watch(&quot;open&quot;, o =&gt; !o &amp;&amp; window.setTimeout(() =&gt; (open = false), 1000))"
   x-show="open" aria-labelledby="slide-over-title" x-ref="dialog" aria-modal="true" class="bg-gray-900 ">
   <div class="absolute inset-y-0 overflow-hidden">
      <div x-description="Background overlay, show/hide based on slide-over state." class="absolute inset-0 "
         aria-hidden="true">
         <div class="fixed inset-y-0 right-0 z-20 flex max-w-full mb-0 sm:pl-16">
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
                           <ul class="flex flex-row space-x-2 border-b-gray-400 chat_text">
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
                  <div class="relative flex-1 px-4 mt-5 sm:px-6 scrollbar">
                     {{-- chatbox --}}
                     <div class="absolute inset-0 flex flex-row p-1 rounded-md chat_div">
                        <div
                           class="relative flex-none hidden w-24 px-6 pt-3 overflow-y-scroll bg-gray-900 nav_slide text-purple-lighter md:block rounded-l-md scrollbar">


                           <div class="sticky top-0 mb-4 border-b border-gray-600 cursor-pointer ">
                              <div
                                 class="flex items-center justify-center w-8 h-8 mb-1 overflow-hidden text-2xl font-semibold text-black bg-white rounded-3xl">
                                 <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}">
                              </div>
                           </div>

                        </div>
                        <div class="relative flex flex-col hidden w-64 pb-6 overflow-hidden bg-gray-800 md:block">
                           <div
                              class="flex-none hidden w-full overflow-y-scroll bg-gray-800 friend_slide text-purple-lighter md:block scrollbar">
                              <div
                                 class="absolute flex justify-between w-64 px-4 py-1 mt-3 text-white border-b border-gray-600 shadow-xl ">
                                 <div class="flex-auto">
                                    <h1 class="mb-1 text-xl font-semibold leading-tight truncate">My Server
                                    </h1>
                                 </div>
                                 <div>
                                    <svg class="opacity-50 cursor-pointer arrow-gKvcEx icon-2yIBmh" width="24"
                                       height="24" viewBox="0 0 24 24">
                                       <path fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"
                                          d="M16.59 8.59004L12 13.17L7.41 8.59004L6 10L12 16L18 10L16.59 8.59004Z">
                                       </path>
                                    </svg>
                                 </div>
                              </div>
                           </div>
                           <div class="absolute bottom-0 w-full p-2 bg-gray-700">
                              <div class="flex flex-row w-full call-setting justify-evenly">
                                 <div class="flex items-center p-1 rounded-md hover:bg-slate-400 basis-1/2">
                                    <span>1</span>
                                 </div>
                                 <div
                                    class="flex flex-row space-x-1 justify-evenly first-letter basis-1/2 hover:bg-gray-700">
                                    <div class="flex items-center p-1 rounded-md setting hover:bg-slate-400 ring">
                                       <x-icons.icon class="text-white icon " icon="mic"></x-icons.icon>
                                    </div>
                                    <div class="flex items-center p-1 rounded-md setting hover:bg-slate-400 ring">
                                       <x-icons.icon class="text-white icon " icon="headphones"></x-icons.icon>
                                    </div>
                                    <div class="flex items-center p-1 rounded-md setting hover:bg-slate-400 ring">
                                       <span class="sr-only ">setting</span>
                                       <x-icons.icon class="text-white icon " icon="settings"></x-icons.icon>
                                    </div>
                                 </div>

                              </div>
                           </div>
                        </div>
                        <div
                           class="relative flex-1 flex-grow w-full overflow-hidden rounded-r-md bg-slate-900 scrollbar"
                           x-data="{emojiIcone:false}">

                           <div
                              class="absolute top-0 z-40 flex-none w-full messages_div text-purple-lighter bg-slate-900 ">
                              <div
                                 class="flex justify-between w-full px-4 py-1 mt-3 mb-2 text-white border-b border-gray-600 shadow-xl">
                                 <div class="flex-auto">
                                    <h1 class="mb-1 text-xl font-semibold leading-tight truncate">Discussion
                                       Channel
                                    </h1>
                                 </div>
                                 <div>
                                    <svg class="opacity-50 cursor-pointer arrow-gKvcEx icon-2yIBmh" width="24"
                                       height="24" viewBox="0 0 24 24">
                                       <path fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"
                                          d="M16.59 8.59004L12 13.17L7.41 8.59004L6 10L12 16L18 10L16.59 8.59004Z">
                                       </path>
                                    </svg>
                                 </div>
                              </div>

                           </div>
                           <div class="relative w-full h-full text-white general border-b-slate-700 -mt-9 md:mt-0 ">
                              <div
                                 class=" messages relative  w-full  flex flex-col   rounded-t-lg dark:bg-gray-700 right-0 {{$taping?'block':'hidden' }}  overflow-y-scroll scrollbar"
                                 id="chatbox">
                                 @if (count($messages) > 0)
                                 <form enctype="multipart/form-data">
                                    @csrf
                                    <div class="absolute bottom-0 w-full h-20 min-h-0 " id="message_content">
                                       @foreach ($messages as $currentMessage)
                                       @if ($currentMessage['user']['id'] == $user->id)
                                       <div
                                          class="flex items-start p-1 px-5 mb-0 text-sm border-b border-gray-600 rounded-md hover:bg-gray-600"
                                          id="message.{{md5($loop->index)}}">
                                          @if ($currentMessage['user']['avatar'])
                                          <img src="{{ $currentMessage['user']['avatar'] }}"
                                             class="w-8 h-8 mr-3 cursor-pointer rounded-3xl">
                                          @else
                                          <img src="{{ Auth::user()->profile_photo_url }}"
                                             alt="{{ Auth::user()->name }}"
                                             class="w-8 h-8 mr-3 cursor-pointer rounded-3xl">
                                          @endif

                                          <div class="flex-1 overflow-hidden">
                                             <div>
                                                <span class="font-bold text-red-300 cursor-pointer hover:underline">{{
                                                   $currentMessage['user']['name'] }}</span>
                                                <span class="text-xs font-bold text-gray-400"> {{ now() }}</span>
                                             </div>
                                             <p class="leading-normal text-white inline-flex justify-items-stretch justify-around text-justify flex-wrap"
                                                id="message"> {!!$currentMessage['message']!!}</p>
                                          </div>
                                       </div>
                                       {{-- <div
                                          class="flex items-start justify-between w-full p-3 mb-4 bg-gray-100 border-b border-l-4 border-blue-300 shadow-lg border-b-gray-600 dark:bg-gray-700 dark:text-white message will-change-scroll"
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
                                          class="flex items-start justify-between py-1 mb-4 bg-gray-200 border-l-4 shadow-lg dark:bg-gray-600 dark:text-white message w-hull will-change-scroll border-lime-300"
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
                                          class="flex items-start p-1 px-5 mb-0 text-sm bg-gray-500 border-b border-gray-600 rounded-md hover:bg-gray-700"
                                          id="message.{{md5($loop->index)}}">
                                          @if ($currentMessage['user']['avatar'])
                                          <img src="{{ $currentMessage['user']['avatar'] }}"
                                             class="w-8 h-8 mr-3 cursor-pointer rounded-3xl">
                                          @else
                                          <img src="{{ Auth::user()->profile_photo_url }}"
                                             alt="{{ Auth::user()->name }}"
                                             class="w-8 h-8 mr-3 cursor-pointer rounded-3xl">
                                          @endif
                                          <div class="flex-1 overflow-hidden">
                                             <div>
                                                <span class="font-bold text-red-300 cursor-pointer hover:underline">{{
                                                   $currentMessage['user']['name'] }}</span>
                                                <span class="text-xs font-bold text-gray-400"> {{ now() }}</span>
                                             </div>
                                             <p class="leading-normal text-white  inline-flex justify-items-stretch justify-around  text-justify "
                                                id="message">
                                                {!!$currentMessage['message']!!}</p>
                                          </div>
                                       </div>
                                       @endif
                                       @endforeach
                                    </div>
                                 </form>
                                 @endif
                              </div>

                           </div>
                           {{-- unicode emoji --}}
                           <div class="container absolute bottom-0 flex flex-col mx-auto overflow-hidden rounded-md">
                              <div class="fixed md:w-1/4 right-2 bottom-32 " id="emojis"
                                 @keydown.window.escape="emojiIcone = false"
                                 x-init="$watch(&quot;emojiIcone&quot;, o =&gt; !o &amp;&amp; window.setTimeout(() =&gt; (emojiIcone = false), 1000))"
                                 x-show="emojiIcone" aria-labelledby="slide-over-title" x-ref="dialog" aria-modal="true"
                                 class="bg-gray-900 ">
                                 <form x-show="emojiIcone"
                                    x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
                                    x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
                                    x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
                                    x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full">
                                    @csrf
                                    <div
                                       class="p-1 overflow-y-scroll bg-white rounded-md hover:outline-none hover:ring-4 hover:ring-green-300 md:h-96 h-80 scrollbar">

                                       <ul
                                          class="flex flex-col flex-wrap items-center flex-grow w-full emotions divide-y-1">
                                          @foreach (($data) as $key=> $emotions)
                                          <h1 class="mb-2 text-base text-center text-gray-700 uppercase">{{ $key}}</h1>
                                          <li class="flex flex-row flex-wrap items-center justify-between w-full p-1 mb-2 text-xl text-gray-300 ring-1 "
                                             wire:key="emotions.{{md5($key)}}">
                                             @foreach ($emotions as $emotionKey => $emotion)
                                             @if ($key)
                                             <input type="text" value="{{$emotion}}" class="hidden emojis">
                                             <button type="button" wire:key="{!!htmlspecialchars($emotion)!!}"
                                                @click="emojiIcone= false"
                                                class="p-1 rounded-md hover:bg-gray-400 emoji_btn">
                                                <span class="space-x-1 text-lg " data="{{$emotion}}"
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
                              <div class="py-1 mx-2 overflow-hidden md:mx-5">
                                 <form>
                                    @csrf
                                    <div
                                       class="flex flex-row w-full p-1 overflow-hidden bg-gray-700 rounded-lg b ring-2 dark:bg-gray-600 hover:bg-gray-500 ">
                                       <button>
                                          <x-icons.icon
                                             class="inline-flex items-center px-1 text-gray-100  border py-2 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600"
                                             icon="data_saver_on">
                                          </x-icons.icon>
                                          <span class="sr-only"> upload image</span>
                                       </button>

                                       <div class=" basis-5/6 flex">
                                          <div id="inputMessage" contenteditable="true" autofocus required='message'
                                             wire:keydown.enter='chatMessage($event.target.innerHTML)'
                                             class="placeholder:italic placeholder:text-slate-100 text-white focus:border-transparent  flex-1 min-w-0 text-sm py-2.5 space-x-1 dark:bg-gray-700 dark:border-transparent dark:placeholder-gray-400 dark:text-white  appearance-non flex-wrap text-justify overflow-hidden  inline-flex placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 rounded-r-md  focus:ring-1 pl-2 max-h-[600px] overflow-y-scroll scrollbar  px-1 container form-input bg-gray-700"
                                             placeholder="Envoyer  message .... ">
                                          </div>
                                          <span class="sr-only"> send your message</span>
                                       </div>

                                       <button type="button" @click="emojiIcone= !emojiIcone">
                                          <span
                                             class="px-2.5 py-1.5 mx-2 text-xl font-medium text-white bg-gray-800 rounded-lg hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">{{$face}}</span>
                                          <span class="sr-only">Imoji icon</span>
                                       </button>

                                    </div>
                                 </form>
                                 <div class="left-0 right-0 w-full ">
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
                           <div class="absolute inset-y-0 left-0 flex w-20 bg-gray-300 dark:bg-gray-600">
                              <div class="flex flex-col items-center px-2 py-1 ">
                                 <img class="w-8 h-8 rounded-full"
                                    src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80"
                                    alt="">
                              </div>
                           </div>
                           <div class="flex w-64 h-full bg-gray-500 dark:bg-gray-600">
                              <div class="flex flex-col items-center px-2 py-1 ">
                                 <img class="w-8 h-8 rounded-full"
                                    src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80"
                                    alt="">
                              </div>
                              <div
                                 class="inset-y-0 flex flex-col overflow-y-auto bg-gray-900 scroll-auto max-h-[780px] py-12 -mt-12">
                                 <div class="">

                                    <div
                                       class="will-change-contents   widthcal  bottom-10 -my-8 scroll-auto  bg-gray-100 overflow-y-auto rounded-t-lg  scrollbar dark:bg-gray-700 right-0 {{$taping?'block':'hidden' }} will-change-scroll  ring-2 ring-green-400 overflow-y-scroll"
                                       id="chatbox">

                                       @if (count($messages) > 0)
                                       <div class="w-full scroll-auto will-change-scroll scroll-my-20 ">

                                          @foreach ($messages as $currentMessage)
                                          @if ($currentMessage['user']['id'] == $user->id)
                                          <div
                                             class="flex items-start justify-between w-full px-3 bg-gray-100 border-b border-l-4 border-blue-300 shadow-lg border-b-gray-300 dark:bg-gray-700 dark:text-white message will-change-scroll"
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
                                             class="flex items-start justify-between px-3 bg-gray-200 border-l-4 shadow-lg dark:bg-gray-600 dark:text-white message w-hull will-change-scroll border-lime-300"
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
                                       <div class="h-24 pb-32 mb-12 "></div>
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
      const editMessage =(el)=>{
         const selection = window.getSelection();  
         const range = document.createRange();  
         selection.removeAllRanges();  
         range.selectNodeContents(el);  
         range.collapse(false);  
         selection.addRange(range);  
         el.focus();
      }
      window.addEventListener('livewire:load', function (e) {
         var emojis = document.getElementById('emojis');
         var emojiBtns = emojis.querySelectorAll('.emoji_btn');
         var input = document.getElementById('inputMessage');
        
         emojiBtns.forEach(function (btn) {
            btn.addEventListener('selectionchange', function (e) {
               let Eltarget = e.target;
               let currentClass = Eltarget.className;
               var emoji = Eltarget.outerHTML;
               var input = document.getElementById('inputMessage');
            input.innerHTML = input.innerHTML + emoji
              console.log(currentClass);
              
              editMessage(input);
              this.blur();
            });
         });
        
      });
   </script>
</div>