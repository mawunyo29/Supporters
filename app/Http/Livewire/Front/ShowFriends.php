<?php

namespace App\Http\Livewire\Front;

use App\Models\Friend;
use App\Models\User;
use Livewire\Component;



class ShowFriends extends Component
{
    public $user;
    public $friends;
    public $find_all_friends =[];
    public function mount()
    {
        $this->user = auth()->user();
        $this->friends = $this->user->friends;
        $this->find_all_friends = Friend::with('users')->where('friend_id', $this->user->id)->get();
       
       
    }
   
    
    public function render()
    {
        return view('livewire.front.show-friends');
    }
}
