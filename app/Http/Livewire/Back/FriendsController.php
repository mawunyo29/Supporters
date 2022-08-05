<?php

namespace App\Http\Livewire\Back;

use App\Events\SendInvitationEvent;
use App\Events\SendMessageEvent;
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
    public $showNewUserNotification = false;


    public function mount(User $user)
    {
        $this->auth_user = Auth::user();
        $this->user = $user;
        $this->message = $this->auth_user->name.' sent you a friend request';
    }

    protected $listeners = [
        "sendRequest"
    ];
    /**
     * get alls friends when the user is connected
     * 
     */
    public function listeners()
    {
        return [
            "sendNotification:".$this->user->id => 'notifyNewUser',
            // // Or:
            // "echo-presence:orders.{$this->orderId},OrderShipped" => 'notifyNewOrder',
        ];
    }

    public function notifyNewUser()
    {
        
       
        $this->showNewUserNotification = true;
        $this->dispatchBrowserEvent('sendNotification');

      
    }
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
    public function getFriendById($id)
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
       
       $this->user->broadcastChannel();
    }
    public function closeModal()
    {
        $this->is_open_send_invitation = false;
        redirect()->route('dashboard');
    }
    public function sendInvitation()
    {
        
        try {
            $allready_sent =  $this->user->unreadNotifications()->where('type', 'App\Notifications\FriendInviteNotification')->where('data->user_id', $this->auth_user->id)->first();

            if ($allready_sent != null) {
                redirect()->to('/dashboard')->with('error', 'You have already sent a request to this user');
            } else {
               
 
                
                 event(new SendInvitationEvent($this->user, $this->auth_user, $this->message));
             redirect()->to('/dashboard')->with('success', 'Request sent successfully');

                $this->is_open_send_invitation = false;
                
                
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

        $this->notify($this->user_to_add, new FriendInviteNotification($this->auth_user, $this->message));
        $this->getFriends();
    }

    /**
     * 
     * accept friend request
     */
    public function acceptUserAsFriend()
    {
    }
    /**
     * 
     * decline friend request
     */
    public function declineUserAsFriend()
    {
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

        if (isset($user->unreadNotifications)) {
            $this->notifications = $user->unreadNotifications;
            return Blade::render('dashboard', [
                'user' => $user,
                'notifications' => $this->notifications,
            ]);
        } else {
            $this->notifications = [];
            session()->flash('error', 'No notifications');
        }
    }





    public function render()
    {
        return view('livewire.back.friends-controller');
    }
}
