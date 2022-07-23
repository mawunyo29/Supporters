<div>
    @if ($user->unreadNotifications->count() > 0)
    <aside class="z-0 hidden sm:block sm:flex-shrink-0 sm:order-fast ">
        <div class="relative flex flex-col h-full bg-gray-100 border-r border-gray-200 w-96" x-show="showNotifications"
            x-transition:enter="transition ease-out duration-150 sm:ease-in-out sm:duration-300"
            x-transition:enter-start="transform opacity-0 scale-110 sm:-translate-x-full sm:scale-100 sm:opacity-100"
            x-transition:enter-end=" transform opacity-100 scale-100 sm:translate-x-0 sm:scale-100 sm:opacity-100  orgin-left "
            x-transition:leave="transition ease-in duration-150 sm:ease-in-out sm:duration-300"
            x-transition:leave-start="transform opacity-100 scale-100 sm:translate-y-0 sm:scale-100 sm:opacity-100"
            x-transition:leave-end="transform opacity-0 scale-110 sm:-translate-x-full sm:scale-100 sm:opacity-100"
            style="display: none">
            <div class="flex-shrink-0 dark:bg-slate-600 dark:text-white">
                <div class="flex flex-col justify-center h-16 px-6 bg-white dark:bg-slate-600">
                    <div class="flex items-baseline space-x-3">
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">Inbox</h2>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-100">{{$user->notifications->count() }} messages</p>
                    </div>
                </div>
                <div class="px-6 py-4 text-sm font-medium text-gray-500 border-t border-b border-gray-200 bg-gray-50  dark:bg-blue-800">
                    Sorted by date
                </div>
            </div>
            <nav aria-label="Message list" class="flex-1 min-h-0 overflow-y-auto">

                <ul role="list" class="border-b border-gray-200 divide-y divide-gray-200">

                    @foreach ($user->unReadNotifications as $notification)

                    <li wire:key='{{md5($notification->id)}}'
                        class="relative px-6 py-5 bg-white hover:bg-gray-50 focus-within:ring-2 focus-within:ring-inset focus-within:ring-blue-600 dark:bg-gray-900 border-l-4 {{$loop->index%2==0? 'border-l-green-300':($loop->index%3==1? 'border-l-yellow-300':'border-l-fuchsia-600')}}">
                        <div class="flex justify-between space-x-3">
                            <div class="flex-1 min-w-0">
                                <a href="#" class="block focus:outline-none">
                                    <span class="absolute inset-x-0" aria-hidden="true"></span>
                                    <p class="text-sm font-medium  truncate"> {{"Invitation de 
                                        
                                        ".$notification->data['name']}}</p>
                                    {{-- <p class="text-sm text-gray-500 truncate">{{$notification->data['body']}}</p>
                                    --}}
                                </a>
                            </div>
                            <time datetime="{{now()}}"
                                class="flex-shrink-0 text-sm text-gray-500 whitespace-nowrap">{{$notification->created_at->diffForHumans(now())}}</time>
                        </div>
                        {{-- <div class="mt-1">
                            <p class="text-sm text-gray-600 line-clamp-2">
                                {{"You have a new message from ".$notification->data['name']}}
                            </p>
                        </div> --}}

                        <div class="flex items-center mx-1 space-x-10  hover:text-gray-700 ">
                            <button wire:click="invitationAction({{$notification}}) " type="button"
                                class="flex items-center justify-center w-6 h-6 text-green-800 bg-gray-200 rounded-full hover:bg-blue-600 hover:text-green-300 goup ">
                                <span class="text-base material-symbols-outlined">
                                    person_add
                                </span>
                                <span class="hidden text-xs text-gray-700 group-hover:block dark:text-white">
                                    {{__(' J\'accepte ok')}}
                                </span>
                            </button>
                           
                            <button
                                class="flex items-center justify-center w-8 h-8 text-red-800 bg-gray-200 rounded-full hover:bg-blue-600 hover:text-green-300 goup">
                                <span class="text-base material-symbols-outlined group-hover:bg-blue-500">
                                    link
                                </span>
                                <span
                                    class="hidden px-4 text-xs text-gray-700 bg-white group-hover:block dark:text-white py4 hover:shadow-lg shadow-yellow-100">
                                    {{__(' Je regarde le profile')}}
                                </span>
                            </button>

                        </div>
                    </li>
                    @endforeach
                    <li
                        class="relative px-6 py-5 bg-white hover:bg-gray-50 focus-within:ring-2 focus-within:ring-inset focus-within:ring-blue-600">
                        <div class="flex justify-between space-x-3">
                            <div class="flex-1 min-w-0">
                                <a href="#" class="block focus:outline-none">
                                    <span class="absolute inset-0" aria-hidden="true"></span>
                                    <p class="text-sm font-medium text-gray-900 truncate">Rafael Klocko</p>
                                    <p class="text-sm text-gray-500 truncate">Aut sed aut illum delectus
                                        maiores laboriosam ex</p>
                                </a>
                            </div>
                            <time datetime="2021-01-27T16:35"
                                class="flex-shrink-0 text-sm text-gray-500 whitespace-nowrap">1d ago</time>
                        </div>
                        <div class="mt-1">
                            <p class="text-sm text-gray-600 line-clamp-2">
                               {{__(' Doloremque dolorem maiores assumenda dolorem facilis. Velit vel in a rerum
                                natus facere. Enim rerum eaque qui facilis. Numquam laudantium sed id
                                dolores omnis in. Eos reiciendis deserunt maiores et accusamus quod dolor.')}}
                            </p>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
    @endif
    <x-jet-dialog-modal wire:model="accept" >
        <x-slot name="title">
            {{__('Supprimer cette invitation?')}}
        </x-slot>
        <x-slot name="content">
            @if ($user_to_add)
                {{__('Voulez-vous vraiment supprimer cette invitation '.$user_to_add->name.'?')}}
            @endif
            
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('accept_request')" class="mx-2">
                {{__('accepter')}}
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click="$toggle('decline_request')" class="mx-2">
                {{__('decliner')}}
            </x-jet-secondary-button>
            
        </x-slot>
    </x-jet-dialog-modal>
</div>