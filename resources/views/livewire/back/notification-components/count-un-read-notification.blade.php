<a href="{{route('notifications')}}" @click.prevent="showNotifications= !showNotifications"
    class="flex items-center px-2 py-2 text-sm font-medium text-gray-800 rounded-md dark:text-white hover:bg-gray-700 hover:text-white group"
    x-state-description='undefined: "bg-gray-900 text-white", undefined: "text-gray-800 dark:text-white hover:bg-gray-700 hover:text-white"'>
    <svg class="flex-shrink-0 w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-100 dark:text-white"
        x-state-description='undefined: "text-gray-800 dark:text-white", undefined: "text-gray-400 group-hover:text-gray-100 dark:text-white"'
        x-description="Heroicon name: outline/mail" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
        stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
        </path>
    </svg>
    @foreach ($notifications as $notification)
    @if ($notification->type == 'App\Notifications\FriendInviteNotification')
    <span
        class="fixed items-center w-4 h-4 mt-2 ml-2 text-xs text-center text-white bg-red-600 rounded-full">{{$notifications->count()}}</span>
    @endif
    @endforeach
    <p
        class="fixed items-center hidden px-2 py-2 text-center text-gray-700 duration-300 ease-in-out origin-left transform scale-90 bg-gray-200 rounded-md shadow-md left_info group-hover:block ring-2 group-hover:translate-y-full ">
        {{$notifications->count() >0? __("Vous avez ".$notifications->count()." invitations en
        attente"):"Vous n'avez pas de message" }} </p>
    <p class="left_slider_content">Notifications</p>

</a>