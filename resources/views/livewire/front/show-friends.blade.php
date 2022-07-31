<div class=" flex  w-full">
    <div class="block">
        @foreach ($friends as $friend)
        <div>
            <img src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-dashboard/assets/img/drake.jpg"
                alt="avatar image" wire:offline.class.remove="ring-green-300"
                class="inline-flex items-center justify-center w-12 h-12 mr-2  ring-2 ring-green-300 text-white transition-all duration-200 ease-in-out rounded-full cursor-pointer text-size-sm rounded-circle" />
        </div>
        <span> {{$friend->name}}</span>
        @endforeach

    </div>
    <div class="block">
        @foreach ($find_all_friends as $item)
        @foreach ($item->users as $user)
        @if ($user->id != Auth::user()->id)
        <div>
            <img src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-dashboard/assets/img/drake.jpg"
                alt="avatar image" wire:offline.class.remove="ring-green-300"
                class="inline-flex items-center justify-center w-12 h-12 mr-2  ring-2 ring-green-300 text-white transition-all duration-200 ease-in-out rounded-full cursor-pointer text-size-sm rounded-circle" />
        </div>
        <span>{{$user->name}}</span>
        @endif
        @endforeach
        @endforeach
    </div>
</div>