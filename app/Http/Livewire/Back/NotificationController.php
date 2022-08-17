<?php

namespace App\Http\Livewire\Back;

use App\Models\Friend;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Livewire\Component;

class NotificationController extends Component
{
    public $user;
    public $diff_days;
    public $accept = false;
    public $decline_request = false;
    public $accept_request = false;
    public $user_to_add;
    public $notification_id;
    public $showNewUserNotification=false;
    public function mount($user)
    {
        $this->user = $user;
    }
    protected $listeners = ["sendNotification" => '$refresh'];

    /**
     * accept friend request
     */
    public function updatedAcceptRequest()
    {
        $data = [
            'user_id' => $this->user->id,
            'friend_id' =>$this->user_to_add->id, 
            'name' => $this->user_to_add->name,   
        ];
        
      $friend =  Friend::updateOrCreate($data);
     if(!isset($friend)){
        return redirect()->route('dashboard')->with('error', 'Sorry, you can not add yourself as a friend');
     }else{

        $this->user->friends()->attach($friend->id);
        $this->user->unReadNotifications->where('id', $this->notification_id)->first()->markAsRead();
        $this->accept = false;
        return redirect()->route('dashboard')->with('success', 'Friend request accepted');
     }
      
    }

    /**
     * decline friend request
     */
    public function invitationAction($notification)
    {
        $user_id = $notification['data']['user_id'];

        $this->user_to_add = User::findOrFail($user_id);

        $this->notification_id = $notification['id'];
        $this->accept = !$this->accept;
    }

    public function upatedUserToAdd($user)
    {
        $this->user_to_add = $user;
        $this->accept = false;
    }
    /**
     * decline friend request
     */
    public function updatedDeclineRequest()
    {

        $this->user->unReadNotifications->where('id', $this->notification_id)->first()->markAsRead();
        $this->decline_request = false;
        $this->accept = false;
        return redirect()->route('dashboard')->with('success', 'Friend request declined');
    }


    public function render()
    {
        return view('livewire.back.notification-controller');
    }
}
