<?php

namespace App\Http\Livewire\Back;

use App\Models\User;
use App\Notifications\FriendInviteNotification;
use Illuminate\Queue\Middleware\ThrottlesExceptions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class FriendsController extends Component
{
    public $friends;
    public $user_to_add;
    public $search;
    public $pagination;
    public $auth_user;
    public $friend_to_delete;
    public $friend_to_accept;
    public $friend_to_decline;
    public $friend_to_block;
    public $friend_to_unblock;
    public $message;
    public $message_to;
    public $message_subject;
    public $message_body;
    public $is_open_send_invitation = true;
    public $user;
    public $notifications;


    public function mount(User $user)
    {
        $this->auth_user = Auth::user();
       $this->user = $user;
       
       
    }
    protected $listeners = ["sendRequest"
    ];
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
     * send request to any user
     * 
     */
    public function sendRequest($id)
    {
        $this->user_to_add = User::findOrfail($id);
       
       
        return Blade::render('dashboard', [
            'user' => $this->user_to_add,
            'auth_user' => $this->auth_user,
        ]);

    }
    /**
     * open the send invitation modal
     * 
     */
    public function updatedIsOpenSendInvitation()
    {
        $this->is_open_send_invitation = !$this->is_open_send_invitation;
       
        redirect()->back();
    }
    public function addFriend()
    {
       
       
       try {
        //code...
        if($this->user->notifications->first()->data["user_id"] == $this->auth_user->id && $this->user->notifications->first()->created_at->format("d Y") == now()->format('d Y')){
            redirect()->to('/dashboard')->with('error', 'You have already sent a request to this user');
        }else{
            $this->user->notify(new FriendInviteNotification($this->auth_user));
           redirect()->to('/dashboard')->with('success', 'Request sent successfully');
        }
        

        
       } catch (ThrottlesExceptions $e) {
              # code...
              return redirect()->back()->with('error', 'Vous avez déjà envoyé une invitation à cet utilisateur ou il l\'a déjà reçu');
       }
      
   
        
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
    /**
     * 
     * decline friend request
     */
    public function declineUserAsFriend(){


    }
    /**
     * 
     * delete friend
     */
    public function deleteFriend($id)
    {
        $this->friend_to_delete = $this->auth_user->friends()->where('id', $id)->first();
        $this->friend_to_delete->delete();
        $this->getFriends();
    }

    /**
     * 
     * send message
     */
    public function sendMessage()
    {
      
    }
    /**
     * 
     * get message
     */
    public function getMessage()
    {
        
    }
    /**
     * 
     * delete message
     */
    public function deleteMessage()
    {
        
    }
    /**
     * Get Notifications
     */
    public function getUnReadnotifications()
    {
        $user = Auth::user();
        
        if( isset($user->unreadNotifications)){
            $this->notifications = $user->unreadNotifications;
            return Blade::render('dashboard', [
                'user' => $user,
                'notifications' => $this->notifications,
            ]);
            
        }else{
            $this->notifications = [];
            session()->flash('error', 'No notifications');
        }
    
    }
    
     



    public function render()
    {
        return view('livewire.back.friends-controller');
    }

   
}
