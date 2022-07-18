<div x-data="{ open: false }">
  <nav class=" w-full  overflow-hidden mx-auto px-4 sm:px-6 lg:px-8 ">
    {{-- brand --}}
    <div class="flex justify-between h-16 space-x-2">
      <div class="flex">
        <div class="shrink-0 flex items-center" id="logo_supporters">

          {{-- <a href="{{ route('dashboard') }}">
            <x-jet-application-mark class="block h-9 w-auto " />
          </a> --}}

        </div>

      </div>
      <form class="flex items-center ">
        <div class="flex items-center">
          <label for="location-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Use'rs
            </label>

          <div class="relative">
            <div class="relative w-full">
              <input type="search" id="location-search&quot;" name="search"
                class="block p-2.5 w-full px-10 z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg rounded-l-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                placeholder="Search for city or address" required="">

              <button type="button" class="flex absolute inset-y-0 right-0 items-center pr-2">
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
        <div class="bg-blue-500">
          @if ($users->count() > 0 )
          @foreach ($users as $user)
              {{$user->name}}
          @endforeach
             
          @else
              {{__('there are no users')}}
          @endif
        </div>
      </form>
      <div class="items-center sm:ml-2 flex justify-between ">

        <div class="mr-8 px-2 flex items-center relative ">
          <span
            class="material-symbols-outlined cursor-pointer  absolute rounded-full border-2 border-green-300 ring-2 "
            id="dark-mode-switch">
            dark_mode
          </span>
          <span
            class="material-symbols-outlined cursor-pointer absolute hidden rounded-full border-2 border-green-300 ring-2 text-blue-800"
            id="light">
            light_mode
          </span>
        </div>

        <span class="material-symbols-outlined flex items-center text-blue-800 relative dark:text-white cursor-pointer"
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

        <div class="fixed inset-y-0 right-0 pl-10 max-w-full flex sm:pl-16 z-20">

          <div x-show="open" x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
            x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
            x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
            x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
            class="w-screen max-w-2xl " x-description="Slide-over panel, show/hide based on slide-over state."
            style="display: none">
            <div class="h-full flex flex-col py-6 bg-white shadow-xl overflow-y-scroll">
              <div class="px-4 sm:px-6">
                <div class="flex items-start justify-between">
                  <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">
                    Discussions
                  </h2>
                  <div class="ml-3 h-7 flex items-center">
                    <button type="button"
                      class="bg-white rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                      @click="open = false">
                      <span class="sr-only">Close panel</span>
                      <svg class="h-6 w-6" x-description="Heroicon name: outline/x" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                      </svg>
                    </button>
                  </div>
                </div>
              </div>
              <div class="mt-6 relative flex-1 px-4 sm:px-6 ">
                <!-- Replace with your content -->
                <div class="absolute inset-0 px-4 sm:px-6">
                  <div class="h-full border-2 border-dashed border-gray-200" aria-hidden="true"></div>
                </div>
                <!-- /End replace -->
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

  <div id="left-nav " ondrop="drop_handler(event)"
    class="z-40 min-h-0  divide-y divide-gray-100 rounded dark:divide-transparent pr-2 dark:divide-gray-600  mt-14 space-y-3 items-center right-0 rtl:mr-5 absolute ">
    <div class="px-4 py-5 text-sm text-gray-900 dark:text-white relative">
      <div></div>
      <div class="font-medium truncate "></div>
    </div>
    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200 w-20 space-y-4 relative"
      aria-labelledby="dropdownInformationButton">
      <li id="notification" draggable="true" ondragstart="dragstart_handler(event)"
        class=" rounded-md ring-4 ring-offset-2 ring-gray-600 flex justify-center hover:bg-gray-100 relative  dark:hover:bg-gray-300 dark:bg-gray-800 bg-chat_ ">
        <a href="#" class="block px-4 py-2 ">
          <span class="material-symbols-outlined dark:text-chat_ text-black">
            notifications
          </span>
        </a>
      </li>
      <li
        class=" rounded-md ring-4 ring-offset-2 ring-gray-600 flex justify-center w-20 bg-tephone hover:bg-gray-100  dark:hover:bg-gray-300 dark:bg-gray-800 ">
        <a href="#" class="block px-4 py-2  ">
          <span class="material-symbols-outlined dark:text-tephone ">
            add_call
          </span>
        </a>
      </li>
      <li
        class=" rounded-md ring-4 ring-offset-2 ring-gray-600 flex justify-center w-20 hover:bg-gray-100  dark:hover:bg-gray-300 dark:bg-gray-800 bg-mail_">
        <a href="#" class="block px-4 py-2 "><span class="material-symbols-outlined dark:text-mail_ text-black ">
            mail
          </span></a>
      </li>
    </ul>
    <div
      class=" absolute rounded-lg ring-4 flex justify-center w-20 ring-offset-2 ring-gray-600  py-1 hover:bg-gray-100  dark:hover:bg-gray-300 dark:bg-gray-800 bg-logout_ ">
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
        class="rounded-full cursor-pointer  ring-4 ring-offset-2 ring-gray-600 flex justify-around items-center w-10 h-10 hover:bg-gray-100 m-8  dark:hover:bg-gray-300 dark:bg-gray-800 fixed bottom-0 mb-10 right-0 ">
        <span class="material-symbols-outlined icon_setting">
          settings
        </span>

      </div>
    </div>


  </div>
  @push('scripts')
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
  @endpush

</div>