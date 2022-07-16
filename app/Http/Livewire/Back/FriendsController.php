<?php

namespace App\Http\Livewire\Back;

use App\Models\User;
use Livewire\Component;

class FriendsController extends Component
{
    public $friends;
    public $user_to_add;
    public $search;
    public $pagination;
    private $auth_user;

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
    }
    

    



    public function render()
    {
        return view('livewire.back.friends-controller');
    }
}
