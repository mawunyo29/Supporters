<?php

namespace App\Http\Livewire\Front;

use App\Models\Friend;
use App\Models\User;
use Illuminate\Support\Facades\Blade;
use Livewire\Component;



class ShowFriends extends Component
{
    public $user;
    public $friends;
    public $find_all_friends = [];
    public $find_all_friends_id = [];
    public $currentSlide = 0;


    protected $listeners = [
        'selectFriendById'
    ];
    public function listeners(){
        return [
            "auth_friends:".$this->user->id => 'getUserByFriendId',
            'selectFriend' => 'selectFriend',
        ];
    }
    public function mount()
    {
        $this->user = auth()->user();
        $this->friends = $this->user->friends;
        $this->find_all_friends = Friend::with('users')->where('friend_id', $this->user->id)->get();
    }
    public function withFriends()
    {
        $usersfriends = Friend::with('users')->where('user_id',  $this->user->id)->orwhere('friend_id', $this->user->id)->get();
        foreach ($usersfriends as $usersfriend) {
            if ($usersfriend->user_id == $this->user->id) {
                $this->find_all_friends_id[] =  $this->getUserByFriendId($usersfriend->friend_id);
            } else {
                foreach ($usersfriend->users as $user) {
                    $this->find_all_friends_id[] = $user;
                }
            }
        }
        return $this->find_all_friends_id;
    }
    /**
     * Get the user by friend id.
     *
     * @param  int  $friend_id
     * @return \App\Models\User
     */
    public function getUserByFriendId($friend_id)
    {
        $user = User::find($friend_id);
        $this->emitSelf('auth_friends', $this->user->trackActivity($user->id));
       $this->dispatchBrowserEvent('auth_friends',['activity'=>$this->user->trackActivity($user->id)]);
        return $user;
    }
    /**
     * Select friend.
     *
     * @param  int  $friend_id
     * @return \App\Models\User
     */
    public function selectFriend($friend_id)
    {
      
      
        $this->emitSelf('selectFriend', $friend_id);
        return Blade::render('dashboard', ['user' => $this->user , 'friends' => $this->friends]);
    }

   

    public function render()
    {
        return view('livewire.front.show-friends', ['relationships' => $this->withFriends()]);
    }
}
