<div x-data="{ open: false }">
  <nav class="w-full px-4 mx-auto overflow-hidden sm:px-6 lg:px-8">
    {{-- brand --}}
    <div class="flex flex-row justify-between h-16 space-x-2 md:space-x-6">
      <div class="flex">
        <div class="flex items-center shrink-0" id="logo_supporters">

          {{-- <a href="{{ route('dashboard') }}">
            <x-jet-application-mark class="block w-auto h-9 " />
          </a> --}}

        </div>

      </div>
      <div class=" basis-1/2">
        @livewire('searchs.search-controller')
      </div>
      
     
      <div class="flex items-center justify-between sm:ml-2 ">

        <div class="relative flex items-center px-2 mr-8 ">
          <span
            class="absolute border-2 border-green-300 rounded-full cursor-pointer material-symbols-outlined ring-2 "
            id="dark-mode-switch">
            dark_mode
          </span>
          <span
            class="absolute hidden text-blue-800 border-2 border-green-300 rounded-full cursor-pointer material-symbols-outlined ring-2"
            id="light">
            light_mode
          </span>
        </div>

        <span class="relative flex items-center text-blue-800 cursor-pointer material-symbols-outlined dark:text-white"
          @click="open = true">
          apps
        </span>
      </div>

    </div>
  </nav>

  <div @keydown.window.escape="open = false"
    x-init="$watch(&quot;open&quot;, o =&gt; !o &amp;&amp; window.setTimeout(() =&gt; (open = false), 1000))"
    x-show="open" aria-labelledby="slide-over-title" x-ref="dialog" aria-modal="true">
    <div class="absolute inset-0 overflow-hidden">
      <div x-description="Background overlay, show/hide based on slide-over state." class="absolute inset-0"
       aria-hidden="true">

        <div class="fixed inset-y-0 right-0 z-20 flex max-w-full pl-10 sm:pl-16">

          <div x-show="open" x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
            x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
            x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
            x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
            class="w-screen max-w-2xl " x-description="Slide-over panel, show/hide based on slide-over state."
            style="display: none">
            <div class="flex flex-col h-full py-6 overflow-y-scroll bg-white shadow-xl">
              <div class="px-4 sm:px-6">
                <div class="flex items-start justify-between">
                  <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">
                    Discussions
                  </h2>
                  <div class="flex items-center ml-3 h-7">
                    <button type="button"
                      class="text-gray-400 bg-white rounded-md hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                      @click="open = false">
                      <span class="sr-only">Close panel</span>
                      <svg class="w-6 h-6" x-description="Heroicon name: outline/x" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                      </svg>
                    </button>
                  </div>
                </div>
              </div>
              <div class="relative flex-1 px-4 mt-6 sm:px-6 ">
                <!-- Replace with your content -->
                <div class="absolute inset-0 px-4 sm:px-6">
                  <div class="h-full border-2 border-gray-200 border-dashed" aria-hidden="true"></div>
                </div>
                <!-- /End replace -->
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  {{-- ondrop="drop_handler(event)"
  ondragstart="dragstart_handler(event)" --}}
  <div id="left-nav " 
    class="absolute right-0 z-40 items-center min-h-0 pr-2 space-y-3 divide-y divide-gray-100 rounded dark:divide-transparent dark:divide-gray-600 mt-14 rtl:mr-5 ">
    <div class="relative px-4 py-5 text-sm text-gray-900 dark:text-white">
      <div></div>
      <div class="font-medium truncate "></div>
    </div>
    <ul class="relative w-20 py-1 space-y-4 text-sm text-gray-700 dark:text-gray-200"
      aria-labelledby="dropdownInformationButton">
      <li id="notification" draggable="true" 
        class="relative flex justify-center rounded-md ring-4 ring-offset-2 ring-gray-600 hover:bg-gray-100 dark:hover:bg-gray-300 dark:bg-gray-800 bg-chat_ dark:hover:text-gray-700">
        <a href="#" class="block px-4 py-2 ">
          <span class="text-black material-symbols-outlined dark:text-chat_">
            notifications
          </span>
          <span>{{$user->unreadNotifications->count()}}</span>
        </a>
      </li>
      <li
        class="flex justify-center w-20 rounded-md ring-4 ring-offset-2 ring-gray-600 bg-tephone hover:bg-gray-100 dark:hover:bg-gray-300 dark:bg-gray-800">
        <a href="#" class="block px-4 py-2 ">
          <span class="material-symbols-outlined dark:text-tephone ">
            add_call
          </span>
        </a>
      </li>
      <li
        class="flex justify-center w-20 rounded-md ring-4 ring-offset-2 ring-gray-600 hover:bg-gray-100 dark:hover:bg-gray-300 dark:bg-gray-800 bg-mail_">
        <a href="#" class="block px-4 py-2 "><span class="text-black material-symbols-outlined dark:text-mail_ ">
            mail
          </span></a>
      </li>
    </ul>
    <div
      class="absolute flex justify-center w-20 py-1 rounded-lg ring-4 ring-offset-2 ring-gray-600 hover:bg-gray-100 dark:hover:bg-gray-300 dark:bg-gray-800 bg-logout_">
      <form method="POST" action="{{ route('logout') }}" x-data>
        @csrf

        <x-jet-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();"
          class="block px-4 py-2 text-sm ">
          <span class="material-symbols-outlined text-black_ font-blod dark:text-logout_ ">
            logout
          </span>
        </x-jet-dropdown-link>
      </form>

    </div>
    <div class="pb-4">
      <div
        class="fixed bottom-0 right-0 flex items-center justify-around w-10 h-10 m-8 mb-10 rounded-full cursor-pointer ring-4 ring-offset-2 ring-gray-600 hover:bg-gray-100 dark:hover:bg-gray-300 dark:bg-gray-800 ">
        <span class="material-symbols-outlined icon_setting">
          settings
        </span>

      </div>
    </div>


  </div>
  
  {{-- @push('scripts')
  <script>
    function dragstart_handler(ev) {
     // On ajoute l'identifiant de l'élément cible à l'objet de transfert
     ev.dataTransfer.setData("Supporters", ev.target.id);
     ev.dataTransfer.dropEffect = "move";
     ev.target.classList.add("w-20","bg-gray-100","dark:bg-gray-300","dark:bg-gray-800",'relative','rounded-lg','ring-4','ring-offset-2','ring-gray-600');
     console.log("dragstart_handler:", ev.target.id);
    }
    function dragover_handler(ev) {
     ev.preventDefault();
     ev.dataTransfer.dropEffect = "move"
    }
    function drop_handler(ev) {
     ev.preventDefault();
     // On obtient l'identifiant de la cible et on ajoute l'élément déplacé
     // au DOM de la cible
     var data = ev.dataTransfer.getData("Supporters");
     ev.target.appendChild(document.getElementById(data));
    }
  </script>
  @endpush --}}

</div>