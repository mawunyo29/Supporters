@props(['chat_modal'=>false])
<?php
    $chat_modal = $chat_modal ?? false;
?>
<div x-data="{ open:'{{$chat_modal}}' ,right_nav:false}" >
  <nav class="container mx-auto overflow-hidden sm:px-6 lg:px-8">
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
      <div class="flex items-center justify-between space-x-3 px-2 sm:ml-2">

        <div class="relative flex items-center px-1  ">
          <button class="flex items-center">
            <x-icons.icon class=" rounded-full cursor-pointer relative text-blue-800" icon='dark_mode' id="dark-mode-switch">
            </x-icons.icon>
          </button>
          <button class="flex items-center" >
            <x-icons.icon class=" text-blue-800  rounded-full cursor-pointer relative" icon='light_mode'  style="display: none"
              id="light"></x-icons.icon>
          </button>
        </div>
        <button @click="open= !open"> 
          <x-icons.icon class="relative flex items-center text-blue-800 cursor-pointer px-1 dark:text-white "
            icon='apps'></x-icons.icon>
        </button>
        <button @click="right_nav = !right_nav">
          <x-icons.icon class="relative flex items-center text-blue-800 cursor-pointer  dark:text-white "
            icon='dashboard_customize'></x-icons.icon>
        </button>
      </div>

    </div>
  </nav>

  @livewire('back.chat-message', ['user' => $user ,'chat_modal'=>$chat_modal], key($user->id))
  {{-- ondrop="drop_handler(event)"
  ondragstart="dragstart_handler(event)" --}}
  <div @keydown.window.escape="right_nav = false"
    x-init="$watch(&quot;right_nav&quot;, o =&gt; !o &amp;&amp; window.setTimeout(() =&gt; (right_nav = false), 1000))"
    x-show="right_nav">
    <div class="absolute overflow-hidden inset-y-10">
      <div class="absolute inset-y-20">
        <div class="fixed right-0 z-20 flex max-w-full pl-10 inset-y-36 sm:pl-16 ">
          <div x-show="right_nav" x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
            x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
            x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
            x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
            x-description="Slide-over panel, show/hide based on slide-over state." style="display: none">

            <div id="left-nav " class="flex flex-col h-full px-2 py-6 ">

              <ul class="relative w-20 py-2 space-y-4 text-sm text-gray-700 dark:text-gray-200"
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
                  <a href="#" class="block px-4 py-2 "><span
                      class="text-black material-symbols-outlined dark:text-mail_ ">
                      mail
                    </span></a>
                </li>
              </ul>
              <div
                class="flex justify-center w-20 py-1 my-2 rounded-lg ring-4 ring-offset-2 ring-gray-600 hover:bg-gray-100 dark:hover:bg-gray-300 dark:bg-gray-800 bg-logout_">
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
              <div class="absolute bottom-0 flex items-center justify-around flex-shrink-0 w-20 ">
                <div
                  class="bottom-0 flex items-center justify-around w-10 h-10 rounded-full cursor-pointer ring-4 ring-offset-2 ring-gray-600 hover:bg-gray-100 dark:hover:bg-gray-300 dark:bg-gray-800">
                  <span class="material-symbols-outlined icon_setting">
                    settings
                  </span>

                </div>
              </div>


            </div>
          </div>
        </div>

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