<?php

namespace App\Http\Livewire\Back;

use App\Models\User;
use App\Notifications\FriendInviteNotification;
use Illuminate\Support\Facades\Blade;
use Livewire\Component;

class FriendsController extends Component
{
    public $friends;
    public $user_to_add;
    public $search;
    public $pagination;
    private $auth_user;
    public $friend_to_delete;
    public $friend_to_accept;
    public $friend_to_decline;
    public $friend_to_block;
    public $friend_to_unblock;
    public $message;
    public $message_to;
    public $message_subject;
    public $message_body;


    public function mount()
    {
        $this->auth_user = auth()->user;
        $this->friends = $this->auth_user->friends();
        $this->pagination = $this->friends->paginate(10);
    }
    /**
     * get alls friends when the user is connected
     * 
     */
     
    public function getFriends()
    {
        $this->friends = $this->auth_user->friends();
        
       
    }
    /**
     * get  friend by name
     * 
     */
    public function getFriendByName()
    {
        $this->friends = $this->auth_user->friends()->where('name', 'like', '%' . $this->search . '%')->paginate(10);
    }
    /**
     * get  friend by Id
     * 
     */
    public function getFriendById( $id)
    {
        $this->friend = $this->auth_user->friends()->where('id', $id)->first();
       
    }

    /**
     * friend request
     * 
     */
    public function friendRequest($id)
    {
        $this->user_to_add = User::findOrfail($id);

        return Blade::render('dashboard', [
            'user_to_add' => $this->user_to_add,
        ]);

    }
    /**
     * 
     * block friend
     */
    
    public function blockFriend($id)
    {
        $this->friend_to_block = $this->auth_user->friends()->where('id', $id)->first();
        $this->friend_to_block->block();
        $this->getFriends();
        
    }
    /**
     * 
     * send friend request
     */
    public function sendFriendRequest()
    {
       
       $this->notify($this->user_to_add, new FriendInviteNotification($this->auth_user));
        $this->getFriends();
    }

    /**
     * 
     * accept friend request
     */
    public function acceptUserAsFriend(){

        
    }



    public function render()
    {
        return view('livewire.back.friends-controller');
    }
}
