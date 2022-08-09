<div class="z-40 flex flex-col flex-1 min-h-0 bg-gray-100 shadow-md dark:bg-blue-800 dark:text- ">
    <div class="flex flex-col flex-1 pt-5 pb-4 overflow-y-auto ">
        <div class="flex items-center justify-between flex-shrink-0 px-4 ">
            <a href="{{ route('dashboard') }}" id="logo_dash_l" class="">
                <x-jet-application-mark class="block w-auto h-9 " />
            </a>
            <div>
                <svg class="block w-auto cursor-pointer w-9 h-9" id="reduce_btn" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h8m-8 6h16"></path>
                </svg>
            </div>
        </div>
        <nav class="flex-1 px-2 mt-5 space-y-1 ">
            <a href="{{route('dashboard')}}"
                class="flex items-center px-2 py-2 text-sm font-medium text-white bg-gray-900 rounded-md group"
                x-state:on="Current" x-state:off="Default"
                x-state-description='Current: "bg-gray-900 text-white", Default: "text-gray-800 dark:text-white hover:bg-gray-700 hover:text-white"'>
                <svg class="flex-shrink-0 w-6 h-6 mr-3 text-gray-100 dark:text-white"
                    x-state:on="Current" x-state:off="Default"
                    x-state-description='Current: "text-gray-800 dark:text-white", Default: "text-gray-400 group-hover:text-gray-100 dark:text-white"'
                    x-description="Heroicon name: outline/home" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                    </path>
                </svg>
                <p class="left_slider_content" id="dashboard"> Dashboard</p>
            </a>
            <a href="#"
                class="flex items-center px-2 py-2 text-sm font-medium text-gray-800 rounded-md dark:text-white hover:bg-gray-700 hover:text-white group"
                x-state-description='undefined: "bg-gray-900 text-white", undefined: "text-gray-800 dark:text-white hover:bg-gray-700 hover:text-white"'>
                <svg class="flex-shrink-0 w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-100 dark:text-white"
                    x-state-description='undefined: "text-gray-800 dark:text-white", undefined: "text-gray-400 group-hover:text-gray-100 dark:text-white"'
                    x-description="Heroicon name: outline/users" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                    </path>
                </svg>
                <p class="left_slider_content" id="team"> Amis</p>
            </a>
            <a href="#"
                class="flex items-center px-2 py-2 text-sm font-medium text-gray-800 rounded-md dark:text-white hover:bg-gray-700 hover:text-white group"
                x-state-description='undefined: "bg-gray-900 text-white", undefined: "text-gray-800 dark:text-white hover:bg-gray-700 hover:text-white"'>
                <svg class="flex-shrink-0 w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-100 dark:text-white"
                    x-state-description='undefined: "text-gray-800 dark:text-white", undefined: "text-gray-400 group-hover:text-gray-100 dark:text-white"'
                    x-description="Heroicon name: outline/folder" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z">
                    </path>
                </svg>
                <p class="left_slider_content">Ajouter</p>
            </a>
            {{-- posts article --}}
            <a href="{{ route('posts.index',auth()->user()->id) }}"
                class="flex items-center px-2 py-2 text-sm font-medium text-gray-800 rounded-md dark:text-white hover:bg-gray-700 hover:text-white group"
                x-state-description='undefined: "bg-gray-900 text-white", undefined: "text-gray-800 dark:text-white hover:bg-gray-700 hover:text-white"'>
                <svg class="flex-shrink-0 w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-100 dark:text-white"
                    x-state-description='undefined: "text-gray-800 dark:text-white", undefined: "text-gray-400 group-hover:text-gray-100 dark:text-white"'
                    x-description="Heroicon name: outline/file-text" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 19l7-7 3 3-7 7-3-3z">
                    </path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M18 13a3 3 0 00-3-3h-1a3 3 0 00-3 3v3"></path>
                </svg>
                <p class="left_slider_content">Articles</p>
            </a>
            <a href="#"
                class="flex items-center px-2 py-2 text-sm font-medium text-gray-800 rounded-md dark:text-white hover:bg-gray-700 hover:text-white group"
                x-state-description='undefined: "bg-gray-900 text-white", undefined: "text-gray-800 dark:text-white hover:bg-gray-700 hover:text-white"'>
                <svg class="flex-shrink-0 w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-100 dark:text-white"
                    x-state-description='undefined: "text-gray-800 dark:text-white", undefined: "text-gray-400 group-hover:text-gray-100 dark:text-white"'
                    x-description="Heroicon name: outline/settings" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 01-2.573-1.066c-.895-1.543.826-3.31 2.37-2.37a1.724 1.724 0 012.572 1.065c.426 1.756-.941 3.31-2.37 2.37a1.724 1.724 0 01-2.572-1.065c-.895-1.543.826-3.31
                        2.37-2.37.996.608 2.296.072 2.572-1.065z">
                    </path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z">
                    </path>
                </svg>
                <p class="left_slider_content">Paramètres</p>
            </a>
            <a href="#"
                class="flex items-center px-2 py-2 text-sm font-medium text-gray-800 rounded-md dark:text-white hover:bg-gray-700 hover:text-white group"
                x-state-description='undefined: "bg-gray-900 text-white", undefined: "text-gray-800 dark:text-white hover:bg-gray-700 hover:text-white"'>
                <svg class="flex-shrink-0 w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-100 dark:text-white"
                    x-state-description='undefined: "text-gray-800 dark:text-white", undefined: "text-gray-400 group-hover:text-gray-100 dark:text-white"'
                    x-description="Heroicon name: outline/logout" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                    </path>
                </svg>
                <p class="left_slider_content">Déconnexion</p>
            </a>
            {{-- inbox notification --}}

            @livewire('back.notification-components.count-un-read-notification', ['user' => $user],
            key($user->id))
            {{-- end inbox notification --}}
            <a href="#"
                class="flex items-center px-2 py-2 text-sm font-medium text-gray-800 rounded-md dark:text-white hover:bg-gray-700 hover:text-white group"
                x-state-description='undefined: "bg-gray-900 text-white", undefined: "text-gray-800 dark:text-white hover:bg-gray-700 hover:text-white"'>
                <svg class="flex-shrink-0 w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-100 dark:text-white"
                    x-state-description='undefined: "text-gray-800 dark:text-white", undefined: "text-gray-400 group-hover:text-gray-100 dark:text-white"'
                    x-description="Heroicon name: outline/info" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                    </path>
                </svg>
                <p class="left_slider_content">Aide</p>
            </a>
            {{-- notification count --}}

        </nav>
    </div>
    <div class="flex flex-shrink-0 p-4 bg-gray-700 dark:bg-indigo-800">
        <a href="#" class="flex-shrink-0 block w-full group">
            <div class="flex items-center">
                <div>
                    <img class="inline-block rounded-full h-9 w-9"
                        src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80"
                        alt="" />
                </div>
                <div class="ml-3 left_slider_content" id="profile">
                    <p class="text-sm font-medium text-white">Tom Cook</p>
                    <p
                        class="text-xs font-medium text-gray-300 dark:text-white group-hover:text-gray-100">
                        View profile
                    </p>
                </div>
            </div>
        </a>
    </div>
</div>