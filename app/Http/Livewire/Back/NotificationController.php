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

    public function mount()
    {
        $this->user = Auth::user();
    }

    /**
     * accept friend request
     */
    public function updatedAcceptRequest()
    {

        Friend::updateOrCreate([
            'user_id' =>$this->user_to_add->id,
            'name' => $this->user_to_add->name,
            
        ]);
        $this->user->notifications()->where('id', $this->notification_id)->first()->markAsRead();
        $this->accept = false;
        return redirect()->route('dashboard')->with('success', 'Friend request accepted');
    }
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

        $this->user->notifications()->where('id', $this->notification_id)->first()->markAsRead();
        session()->flash('success', 'Notification has been deleted successfully');
        $this->accept = false;
    }


    public function render()
    {
        return view('livewire.back.notification-controller');
    }
}
